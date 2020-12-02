<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day1\ExpenseReport;

class Day1Test extends TestCase
{
    public function testExpensesGetsValues()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = new ExpenseReport($fixture);

        $matches = $expenses->getMatchingElements(2020);

        $this->assertIsArray($matches);
        $this->assertEquals([1721, 299], $matches);
    }

    public function testExpensesGetsValuesMultiple()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = new ExpenseReport($fixture);

        $matches = $expenses->getMatchingElements(2020, 3);
        $this->assertIsArray($matches);
        $this->assertEquals([979, 366, 675], $matches);
    }

    public function testExpensesSum()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = new ExpenseReport($fixture);

        $result = $expenses->sumMatchingElements(2020);

        $this->assertIsInt($result);
        $this->assertEquals(514579, $result);
    }

    public function testExpensesSumMultiple()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = new ExpenseReport($fixture);

        $result = $expenses->sumMatchingElements(2020, 3);

        $this->assertIsInt($result);
        $this->assertEquals(241861950, $result);
    }

    public function testSolution1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/input.txt');

        $expenses = new ExpenseReport($fixture);

        $result = $expenses->sumMatchingElements(2020);

        $this->assertEquals(1020084, $result);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/input.txt');

        $expenses = new ExpenseReport($fixture);

        $result = $expenses->sumMatchingElements(2020, 3);

        $this->assertEquals(295086480, $result);
    }
}
