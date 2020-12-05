<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day5\BoardingPass;

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

        $highest = 0;

        foreach (explode("\n", $fixture) as $line) {
            $pass = new BoardingPass($line);
            if ($pass->getSeatId() > $highest) {
                $highest = $pass->getSeatId();
            }
        }

        $this->assertEquals(878, $highest);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day5/input.txt');

        $passes = [];

        foreach (explode("\n", $fixture) as $line) {
            $passes[] = (new BoardingPass($line))->getSeatId();
        }

        sort($passes);

        $passId = 0;

        foreach ($passes as $key => $value) {
            if (array_key_exists($key + 1, $passes) && $passes[$key + 1] == $value + 2) {
                $passId = $value + 1;
                break;
            }
        }

        $this->assertEquals(504, $passId);
    }
}