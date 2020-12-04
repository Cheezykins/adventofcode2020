<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class BirthYearValidator extends YearValidator
{
    public function validate(string $entry): bool
    {
        if (!parent::validate($entry)) {
            return false;
        }
        if ((int)$entry < 1920 || (int)$entry > 2002) {
            return false;
        }
        return true;
    }
}
