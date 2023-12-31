<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Runner;

use PHPUnit\Event;
use PHPUnit\Event\Code\NoTestCaseObjectOnCallStackException;
use PHPUnit\Runner\Baseline\Baseline;
use PHPUnit\Runner\Baseline\Issue;
use PHPUnit\Util\ExcludeList;
use function error_reporting;
use function restore_error_handler;
use function set_error_handler;
use const E_DEPRECATED;
use const E_NOTICE;
use const E_STRICT;
use const E_USER_DEPRECATED;
use const E_USER_NOTICE;
use const E_USER_WARNING;
use const E_WARNING;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ErrorHandler
{
    private static ?self $instance = null;
    private ?Baseline $baseline = null;
    private bool $enabled = false;

    public static function instance(): self
    {
        return self::$instance ?? self::$instance = new self;
    }

    /**
     * @throws NoTestCaseObjectOnCallStackException
     */
    public function __invoke(int $errorNumber, string $errorString, string $errorFile, int $errorLine): bool
    {
        $suppressed = !($errorNumber & error_reporting());

        if ($suppressed && (new ExcludeList)->isExcluded($errorFile)) {
            return false;
        }

        $ignoredByBaseline = $this->ignoredByBaseline($errorFile, $errorLine, $errorString);

        switch ($errorNumber) {
            case E_NOTICE:
            case E_STRICT:
                Event\Facade::emitter()->testTriggeredPhpNotice(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_USER_NOTICE:
                Event\Facade::emitter()->testTriggeredNotice(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_WARNING:
                Event\Facade::emitter()->testTriggeredPhpWarning(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_USER_WARNING:
                Event\Facade::emitter()->testTriggeredWarning(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_DEPRECATED:
                Event\Facade::emitter()->testTriggeredPhpDeprecation(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_USER_DEPRECATED:
                Event\Facade::emitter()->testTriggeredDeprecation(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                    $ignoredByBaseline,
                );

                break;

            case E_USER_ERROR:
                Event\Facade::emitter()->testTriggeredError(
                    Event\Code\TestMethodBuilder::fromCallStack(),
                    $errorString,
                    $errorFile,
                    $errorLine,
                    $suppressed,
                );

                break;

            default:
                return false;
        }

        return true;
    }

    /**
     * @psalm-param non-empty-string $file
     * @psalm-param positive-int $line
     * @psalm-param non-empty-string $description
     */
    private function ignoredByBaseline(string $file, int $line, string $description): bool
    {
        if ($this->baseline === null) {
            return false;
        }

        return $this->baseline->has(Issue::from($file, $line, null, $description));
    }

    public function enable(): void
    {
        if ($this->enabled) {
            return;
        }

        $oldErrorHandler = set_error_handler($this);

        if ($oldErrorHandler !== null) {
            restore_error_handler();

            return;
        }

        $this->enabled = true;
    }

    public function disable(): void
    {
        if (!$this->enabled) {
            return;
        }

        restore_error_handler();

        $this->enabled = false;
    }

    public function use(Baseline $baseline): void
    {
        $this->baseline = $baseline;
    }
}
