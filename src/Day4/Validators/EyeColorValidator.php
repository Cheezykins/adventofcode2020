<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


class EyeColorValidator implements Validator
{
    public function validate(string $entry): bool
    {
        return in_array($entry, [
            'amb',
            'blu',
            'brn',
            'gry',
            'grn',
            'hzl',
            'oth'
        ]);
    }

}
