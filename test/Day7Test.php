<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day7\Baggage;

class Day7Test extends TestCase
{
    public function testExample()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day7/example.txt');

        $baggage = Baggage::loadFromString($fixture);

        $count = $baggage->countUniqueContainersOfBag('shiny gold');

        $this->assertEquals(4, $count);
    }

    public function testSolution()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day7/input.txt');

        $baggage = Baggage::loadFromString($fixture);

        $count = $baggage->countUniqueContainersOfBag('shiny gold');

        $this->assertEquals(115, $count);
    }

    public function testExample2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day7/example.txt');

        $baggage = Baggage::loadFromString($fixture);

        $count = $baggage->countContentsOfBag('shiny gold');

        $this->assertEquals(32, $count);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day7/input.txt');

        $baggage = Baggage::loadFromString($fixture);

        $count = $baggage->countContentsOfBag('shiny gold');

        $this->assertEquals(1250, $count);
    }
}
