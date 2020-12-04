<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class HairColorValidator implements Validator
{
    public function validate(string $entry): bool
    {
        return (bool)preg_match('/^#[0-9a-f]{6}$/', $entry);
    }

}
