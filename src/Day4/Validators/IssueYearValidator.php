<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class IssueYearValidator extends YearValidator
{

    public function validate(string $entry): bool
    {
        return parent::validate($entry) && (int)$entry >= 2010 && (int)$entry <= 2020;
    }
}
