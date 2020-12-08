<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day8\Program;

class Day8Test extends TestCase
{
    public function testExample()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day8/example.txt');

        $program = Program::loadFromString($fixture);

        try {
            $program->run();
        } catch (\Exception $exception) {
            $this->assertEquals(5, $program->getAccumulator());
        }
    }

    public function testSolution()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day8/input.txt');

        $program = Program::loadFromString($fixture);

        try {
            $program->run();
        } catch (\Exception $exception) {
            $this->assertEquals(1451, $program->getAccumulator());
        }
    }

    public function testExample2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day8/example.txt');

        $program = Program::loadFromString($fixture);

        $result = $program->runSequence();

        $this->assertEquals(8, $result);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day8/input.txt');

        $program = Program::loadFromString($fixture);

        $result = $program->runSequence();

        $this->assertEquals(1160, $result);
    }
}
