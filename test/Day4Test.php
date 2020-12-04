<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day4\PassportLoader;

class Day4Test extends TestCase
{
    public function testExample()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day4/example.txt');

        $loader = PassportLoader::loadFromString($fixture);

        $count = $loader->countValidPassports();

        $this->assertEquals(2, $count);
    }

    public function testSolution()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day4/input.txt');

        $loader = PassportLoader::loadFromString($fixture);

        $count = $loader->countValidPassports();

        $this->assertEquals(121, $count);
    }
}
