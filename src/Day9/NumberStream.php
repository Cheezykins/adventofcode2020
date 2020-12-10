<?php


namespace Cheezykins\AdventOfCode2020\Day9;


class NumberStream
{
    protected int $preambleSize;
    protected array $numbers = [];

    public function __construct(array $numbers, int $preambleSize)
    {
        $this->numbers = $numbers;
        $this->preambleSize = $preambleSize;
    }


    public function findBad(): ?int
    {
        foreach ($this->numbers as $cursor => $number) {
            if ($cursor < $this->preambleSize || $this->isValid($cursor, $number)) {
                continue;
            }
            return $number;
        }
        return null;
    }

    public function isValid(int $cursor, int $number): bool
    {
        $candidates = array_slice($this->numbers, $cursor - $this->preambleSize, $this->preambleSize);

        while (($candidate = array_shift($candidates)) !== null) {
            $remainder = $number - $candidate;
            if (in_array($remainder, $candidates)) {
                return true;
            }
        }
        return false;
    }

    public function findSequence(int $target): int
    {

        $sum = 0;
        $windowStart = 0;
        $windowEnd = 0;

        while ($sum !== $target || $windowEnd - $windowStart < 2) {
            if ($sum < $target) {
                $sum += $this->numbers[$windowEnd];
                $windowEnd++;
            } else {
                $sum -= $this->numbers[$windowStart];
                $windowStart++;
            }
        }

        $slice = array_slice($this->numbers, $windowStart, $windowEnd - $windowStart);

        if (count($slice) < 0) {
            return 0;
        }

        return min($slice) + max($slice);
    }

}
