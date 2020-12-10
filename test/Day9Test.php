<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day9\NumberStream;

class Day9Test extends TestCase
{

    protected function getNumbers(string $fixturePath): array
    {
        $fixture = $this->loadFixture($fixturePath);

        $numbers = [];
        foreach (explode("\n", $fixture) as $line)
        {
            $numbers[] = (int)$line;
        }
        return $numbers;
    }

    public function testExample()
    {
        $numbers = $this->getNumbers(__DIR__ . '/fixtures/Day9/example.txt');

        $stream = new NumberStream($numbers, 5);

        $badNumber = $stream->findBad();

        $this->assertEquals(127, $badNumber);

    }

    public function testSolution()
    {
        $numbers = $this->getNumbers(__DIR__ . '/fixtures/Day9/input.txt');

        $stream = new NumberStream($numbers, 25);

        $badNumber = $stream->findBad();

        $this->assertEquals(466456641, $badNumber);
    }


    public function testExample2()
    {
        $numbers = $this->getNumbers(__DIR__ . '/fixtures/Day9/example.txt');

        $stream = new NumberStream($numbers, 5);

        $weakness = $stream->findSequence(127);
        $this->assertEquals(62, $weakness);
    }

    public function testSolution2()
    {
        $numbers = $this->getNumbers(__DIR__ . '/fixtures/Day9/input.txt');

        $stream = new NumberStream($numbers, 25);

        $weakness = $stream->findSequence(466456641);
        $this->assertEquals(55732936, $weakness);
    }
}
