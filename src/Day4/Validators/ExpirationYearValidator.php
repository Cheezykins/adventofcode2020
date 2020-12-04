<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class ExpirationYearValidator extends YearValidator
{

    public function validate(string $entry): bool
    {
        if (!parent::validate($entry)) {
            return false;
        }
        if ((int)$entry < 2020 || (int)$entry > 2030) {
            return false;
        }
        return true;
    }
}
