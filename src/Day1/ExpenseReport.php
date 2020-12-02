<?php


namespace Cheezykins\AdventOfCode2020\Day1;


class ExpenseReport
{

    protected array $expenses;

    /**
     * ExpenseReport constructor.
     * @param string $report
     */
    public function __construct(string $report)
    {
        $this->expenses = explode("\n", $report);
    }

    /**
     * @param int $target
     * @param int $requiredEntries
     * @return int
     */
    public function sumMatchingElements(int $target, int $requiredEntries = 2): int
    {
        return array_reduce($this->getMatchingElements($target, $requiredEntries), fn($carry, $item) => $carry * $item, 1);
    }

    /**
     * @param int $target
     * @param int $requiredEntries
     * @return array
     */
    public function getMatchingElements(int $target, int $requiredEntries = 2): array
    {
        foreach ($this->expenses as $initial) {
            $candidate = $target - $initial;
            if ($requiredEntries > 2) {
                $matchingElements = $this->getMatchingElements($candidate, $requiredEntries - 1);
                if (count($matchingElements) === 0) {
                    continue;
                }
                return array_merge([$initial], $matchingElements);
            } elseif (in_array($candidate, $this->expenses)) {
                return [$initial, $candidate];
            }
        }
        return [];
    }
}
