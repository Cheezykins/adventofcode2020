<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class BirthYearValidator extends YearValidator
{
    public function validate(string $entry): bool
    {
        return parent::validate($entry) && (int)$entry >= 1920 && (int)$entry <= 2002;
    }
}
