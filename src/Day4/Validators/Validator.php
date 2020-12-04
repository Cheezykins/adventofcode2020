<?php


namespace Cheezykins\AdventOfCode2020\Day4\Validators;


interface Validator
{
    public function validate(string $entry): bool;
}
