<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class HeightValidator implements Validator
{
    public function validate(string $entry): bool
    {
        $parts = [];
        if (!preg_match('/^(\d+)(cm|in)$/', $entry, $parts)) {
            return false;
        }
        if ($parts[2] === 'cm' && ((int)$parts[1] < 150 || (int)$parts[1] > 193)) {
            return false;
        } elseif ($parts[2] === 'in' && ((int)$parts[1] < 59 || (int)$parts[1] > 76)) {
            return false;
        }
        return true;
    }

}
