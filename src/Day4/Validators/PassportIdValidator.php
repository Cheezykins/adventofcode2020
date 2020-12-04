<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class PassportIdValidator implements Validator
{
    public function validate(string $entry): bool
    {
        return (bool)preg_match('/^\d{9}$/', $entry);
    }

}
