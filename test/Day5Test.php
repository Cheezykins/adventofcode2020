<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day5\BoardingPass;
use Cheezykins\AdventOfCode2020\Day5\Flight;

class Day5Test extends TestCase
{
    public function testExample()
    {

        $expectations = [
            'FBFBBFFRLR' => [
                'row' => 44,
                'column' => 5,
                'id' => 357
            ],
            'BFFFBBFRRR' => [
                'row' => 70,
                'column' => 7,
                'id' => 567
            ],
            'FFFBBBFRRR' => [
                'row' => 14,
                'column' => 7,
                'id' => 119
            ],
            'BBFFBBFRLL' => [
                'row' => 102,
                'column' => 4,
                'id' => 820
            ]
        ];

        foreach ($expectations as $code => $expectation) {
            $pass = new BoardingPass($code);
            $this->assertEquals($expectation['row'], $pass->getRow());
            $this->assertEquals($expectation['column'], $pass->getColumn());
            $this->assertEquals($expectation['id'], $pass->getSeatId());
        }


    }

    public function testSolution()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day5/input.txt');

        $boarders = explode("\n", $fixture);

        $plane = new Flight();
        $plane->loadBoarders($boarders);

        $this->assertEquals(878, $plane->getHighestSeatId());
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day5/input.txt');

        $boarders = explode("\n", $fixture);

        $plane = new Flight();
        $plane->loadBoarders($boarders);

        $this->assertEquals(504, $plane->findMissingSeat());
    }
}