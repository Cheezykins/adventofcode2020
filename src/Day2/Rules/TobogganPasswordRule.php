<?php


namespace Cheezykins\AdventOfCode2020\Day2\Rules;


class TobogganPasswordRule implements PasswordRule
{

    protected int $firstPosition;
    protected int $secondPosition;
    protected string $letter;

    public function __construct(int $first, int $second, string $letter)
    {
        $this->firstPosition = $first - 1;
        $this->secondPosition = $second - 1;
        $this->letter = $letter;
    }

    public function test(string $password): bool
    {
        $firstMatch = substr($password, $this->firstPosition, 1) === $this->letter;
        $secondMatch = substr($password, $this->secondPosition, 1) === $this->letter;

        if (($firstMatch && $secondMatch) || (!$firstMatch && !$secondMatch)) {
            return false;
        }
        return true;
    }

}
