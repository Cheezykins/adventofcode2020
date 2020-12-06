<?php


namespace Cheezykins\AdventOfCode2020\Day6;


class Group
{
    protected array $individuals;

    protected int $groupSize;

    public function __construct(array $individuals)
    {
        $this->individuals = $individuals;
        $this->groupSize = count($individuals);
    }

    public static function createFromString(string $group): self
    {
        $individuals = [];
        foreach (explode("\n", $group) as $individual) {
            $individuals[] = str_split($individual);
        }
        return new self($individuals);
    }

    protected function mergeIndividuals(): array
    {
        $merge = [];
        foreach ($this->individuals as $individual) {
            $merge = array_merge($merge, $individual);
        }
        return $merge;
    }

    public function getUniqueAnswers(): array
    {
        return array_reduce($this->mergeIndividuals(), function ($carry, $item) {
            $carry[$item] = ($carry[$item] ?? 0) + 1;
            return $carry;
        }, []);
    }

    public function countUniqueAnswers(): int
    {
        return count($this->getUniqueAnswers());
    }

    public function getAnswersEveryoneAgreedOn(): array
    {
        return array_filter($this->getUniqueAnswers(), fn($x) => $x == $this->groupSize);
    }

    public function countAnswersEveryoneAgreedOn(): int
    {
        return count($this->getAnswersEveryoneAgreedOn());
    }
}