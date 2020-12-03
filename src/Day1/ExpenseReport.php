<?php


namespace Cheezykins\AdventOfCode2020\Day1;


class ExpenseReport
{

    /** @var array|int[] */
    protected array $expenses;

    /**
     * ExpenseReport constructor.
     * @param array|int[] $report
     */
    public function __construct(array $report)
    {
        $this->expenses = $report;
    }

    /**
     * @param string $report
     * @return static
     */
    public static function createFromString(string $report): self
    {
        $elements = explode("\n", $report);
        $reportElements = [];
        foreach ($elements as $element) {
            $reportElements[] = (int)$element;
        }
        return new self($reportElements);
    }

    /**
     * @param int $target
     * @param int $requiredEntries
     * @return int
     */
    public function matchingEntryProduct(int $target, int $requiredEntries = 2): int
    {
        return array_reduce($this->getEntriesSummingToTarget($target, $requiredEntries), fn($carry, $item) => $carry * $item, 1);
    }

    /**
     * @param int $target
     * @param int $requiredEntries
     * @param array|int[] $candidates
     * @return array
     */
    public function getEntriesSummingToTarget(int $target, int $requiredEntries = 2, array $candidates = []): array
    {
        if ($candidates === []) {
            $candidates = $this->expenses;
        }
        foreach ($candidates as $index => $candidate) {
            unset($candidates[$index]);
            $remainder = $target - $candidate;
            if ($requiredEntries > 2) {
                $matchingElements = $this->getEntriesSummingToTarget($remainder, $requiredEntries - 1, $candidates);
                if (count($matchingElements) === 0) {
                    continue;
                }
                return array_merge([$candidate], $matchingElements);
            } elseif (in_array($remainder, $candidates)) {
                return [$candidate, $remainder];
            }
        }
        return [];
    }
}
