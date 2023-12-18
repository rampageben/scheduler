<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Event\Test;

use PHPUnit\Event\Code;
use PHPUnit\Event\Event;
use PHPUnit\Event\Telemetry;
use function sprintf;

/**
 * @psalm-immutable
 *
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 */
final class Prepared implements Event
{
    private readonly Telemetry\Info $telemetryInfo;
    private readonly Code\Test $test;

    public function __construct(Telemetry\Info $telemetryInfo, Code\Test $test)
    {
        $this->telemetryInfo = $telemetryInfo;
        $this->test = $test;
    }

    public function telemetryInfo(): Telemetry\Info
    {
        return $this->telemetryInfo;
    }

    public function test(): Code\Test
    {
        return $this->test;
    }

    public function asString(): string
    {
        return sprintf(
            'Test Prepared (%s)',
            $this->test->id(),
        );
    }
}
