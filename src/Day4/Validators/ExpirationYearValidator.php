<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class ExpirationYearValidator extends YearValidator
{

    public function validate(string $entry): bool
    {
        return parent::validate($entry) && (int)$entry >= 2020 && (int)$entry <= 2030;
    }
}
