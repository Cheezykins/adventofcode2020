<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day3\Slope;

class Day3Test extends TestCase
{

    public function testExample1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day3/example.txt');

        $slope = Slope::loadFromString($fixture);

        $trees = $slope->journey(3, 1);

        $this->assertEquals(7, $trees);

    }

    public function testSolution1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day3/input.txt');

        $slope = Slope::loadFromString($fixture);

        $trees = $slope->journey(3, 1);

        $this->assertEquals(191, $trees);
    }

    public function testExample2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day3/example.txt');

        $slope = Slope::loadFromString($fixture);

        $journeys = [
            [
                'right' => 1,
                'down' => 1
            ],
            [
                'right' => 3,
                'down' => 1
            ],
            [
                'right' => 5,
                'down' => 1
            ],
            [
                'right' => 7,
                'down' => 1
            ],
            [
                'right' => 1,
                'down' => 2
            ],
        ];

        $trees = 1;
        foreach ($journeys as $journey) {
            $trees *= $slope->journey($journey['right'], $journey['down']);
        }

        $this->assertEquals(336, $trees);
    }

    public function testsolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day3/input.txt');

        $slope = Slope::loadFromString($fixture);

        $journeys = [
            [
                'right' => 1,
                'down' => 1
            ],
            [
                'right' => 3,
                'down' => 1
            ],
            [
                'right' => 5,
                'down' => 1
            ],
            [
                'right' => 7,
                'down' => 1
            ],
            [
                'right' => 1,
                'down' => 2
            ],
        ];

        $trees = 1;
        foreach ($journeys as $journey) {
            $trees *= $slope->journey($journey['right'], $journey['down']);
        }

        $this->assertEquals(1478615040, $trees);
    }
}
