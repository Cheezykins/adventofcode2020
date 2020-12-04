<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


abstract class YearValidator implements Validator
{
    public function validate(string $entry): bool
    {
        if (!preg_match('/^\d{4}$/', $entry)) {
            return false;
        }
        return true;
    }

}
