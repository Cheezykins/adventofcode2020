<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class IssueYearValidator extends YearValidator
{

    public function validate(string $entry): bool
    {
        if (!parent::validate($entry)) {
            return false;
        }
        if ((int)$entry < 2010 || (int)$entry > 2020) {
            return false;
        }
        return true;
    }
}
