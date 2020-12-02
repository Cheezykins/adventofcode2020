<?php


namespace Cheezykins\AdventOfCode2020\Day2\Rules;


interface PasswordRule
{
    public function __construct(int $first, int $second, string $letter);
    public function test(string $password): bool;
}
