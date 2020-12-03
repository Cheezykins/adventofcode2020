<?php


namespace Cheezykins\AdventOfCode2020\Test;


use Cheezykins\AdventOfCode2020\Day1\ExpenseReport;

class Day1Test extends TestCase
{
    public function testExpensesGetsValues()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $matches = $expenses->getEntriesSummingToTarget(2020);

        $this->assertIsArray($matches);
        $this->assertEquals([1721, 299], $matches);
    }

    public function testExpensesGetsValuesMultiple()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $matches = $expenses->getEntriesSummingToTarget(2020, 3);
        $this->assertIsArray($matches);
        $this->assertEquals([979, 366, 675], $matches);
    }

    public function testExpensesSum()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $result = $expenses->matchingEntryProduct(2020);

        $this->assertIsInt($result);
        $this->assertEquals(514579, $result);
    }

    public function testExpensesSumMultiple()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/example.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $result = $expenses->matchingEntryProduct(2020, 3);

        $this->assertIsInt($result);
        $this->assertEquals(241861950, $result);
    }

    public function testSolution1()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/input.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $result = $expenses->matchingEntryProduct(2020);

        $this->assertEquals(1020084, $result);
    }

    public function testSolution2()
    {
        $fixture = $this->loadFixture(__DIR__ . '/fixtures/Day1/input.txt');

        $expenses = ExpenseReport::createFromString($fixture);

        $result = $expenses->matchingEntryProduct(2020, 3);

        $this->assertEquals(295086480, $result);
    }

    public function testLongArbitraryDepthSolution()
    {
        $fixture = '
1982
1604
689
400
260
1179
1007
588
597
362
280
1843
201
1937
246
1511
1861
1367
1319
1515
1528
1255
1403
35159
798
1784
605
316
1319
';

        $fixture = $this->normaliseWhiteSpace($fixture);

        $expenses = ExpenseReport::createFromString($fixture);

        $result = $expenses->getEntriesSummingToTarget(50000, 14);

        $expectation = [
            1982,
            1604,
            689,
            400,
            260,
            1179,
            1007,
            588,
            1843,
            201,
            1937,
            1367,
            35159,
            1784,
        ];

        $this->assertEquals($expectation, $result);
    }
}
