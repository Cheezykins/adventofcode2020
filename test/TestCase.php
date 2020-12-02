<?php


namespace Cheezykins\AdventOfCode2020\Test;


use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    /**
     * @param string $input
     * @return string
     */
    protected function normaliseWhiteSpace(string $input): string
    {
        return trim(str_replace("\r\n", "\n", $input));
    }

    protected function loadFixture(string $fixturePath): string
    {
        return $this->normaliseWhiteSpace(file_Get_contents($fixturePath));
    }
}
