<?php declare(strict_types=1);
/*
 * This file is part of sebastian/lines-of-code.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\LinesOfCode;

use PhpParser\Error;
use PhpParser\Lexer;
use PhpParser\Node;
use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\ParserFactory;
use function assert;
use function file_get_contents;
use function substr_count;

final class Counter
{
    /**
     * @throws RuntimeException
     */
    public function countInSourceFile(string $sourceFile): LinesOfCode
    {
        return $this->countInSourceString(file_get_contents($sourceFile));
    }

    /**
     * @throws RuntimeException
     */
    public function countInSourceString(string $source): LinesOfCode
    {
        $linesOfCode = substr_count($source, "\n");

        if ($linesOfCode === 0 && !empty($source)) {
            $linesOfCode = 1;
        }

        assert($linesOfCode >= 0);

        try {
            $nodes = $this->parser()->parse($source);

            assert($nodes !== null);

            return $this->countInAbstractSyntaxTree($linesOfCode, $nodes);

            // @codeCoverageIgnoreStart
        } catch (Error $error) {
            throw new RuntimeException(
                $error->getMessage(),
                $error->getCode(),
                $error,
            );
        }
        // @codeCoverageIgnoreEnd
    }

    private function parser(): Parser
    {
        return (new ParserFactory)->create(ParserFactory::PREFER_PHP7, new Lexer);
    }

    /**
     * @psalm-param non-negative-int $linesOfCode
     *
     * @param Node[] $nodes
     *
     * @throws RuntimeException
     */
    public function countInAbstractSyntaxTree(int $linesOfCode, array $nodes): LinesOfCode
    {
        $traverser = new NodeTraverser;
        $visitor = new LineCountingVisitor($linesOfCode);

        $traverser->addVisitor($visitor);

        try {
            /* @noinspection UnusedFunctionResultInspection */
            $traverser->traverse($nodes);
            // @codeCoverageIgnoreStart
        } catch (Error $error) {
            throw new RuntimeException(
                $error->getMessage(),
                $error->getCode(),
                $error,
            );
        }
        // @codeCoverageIgnoreEnd

        return $visitor->result();
    }
}
