<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day6\Group;

class Day6Test extends TestCase
{

    public function testExample1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day6/example.txt');

        $sum = 0;

        foreach (explode("\n\n", $fixture) as $group) {
            $group = Group::createFromString($group);
            $sum += $group->countUniqueAnswers();
        }

        $this->assertEquals(11, $sum);
    }

    public function testSolution1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day6/input.txt');

        $sum = 0;

        foreach (explode("\n\n", $fixture) as $group) {
            $group = Group::createFromString($group);
            $sum += $group->countUniqueAnswers();
        }

        $this->assertEquals(6630, $sum);
    }

    public function testExample2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day6/example.txt');

        $sum = 0;

        foreach (explode("\n\n", $fixture) as $group) {
            $group = Group::createFromString($group);
            $sum += $group->countAnswersEveryoneAgreedOn();
        }

        $this->assertEquals(6, $sum);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day6/input.txt');

        $sum = 0;

        foreach (explode("\n\n", $fixture) as $group) {
            $group = Group::createFromString($group);
            $sum += $group->countAnswersEveryoneAgreedOn();
        }

        $this->assertEquals(3437, $sum);
    }
}