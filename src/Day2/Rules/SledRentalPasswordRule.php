<?php


namespace Cheezykins\AdventOfCode2020\Day2\Rules;


class SledRentalPasswordRule implements PasswordRule
{

    protected int $minInstances;
    protected int $maxInstances;
    protected string $letter;

    public function __construct(int $first, int $second, string $letter)
    {
        $this->minInstances = $first;
        $this->maxInstances = $second;
        $this->letter = $letter;
    }

    public function test(string $password): bool
    {
        $occurrences = substr_count($password, $this->letter);
        if ($occurrences < $this->minInstances) {
            return false;
        } elseif ($occurrences > $this->maxInstances) {
            return false;
        }
        return true;
    }

}
