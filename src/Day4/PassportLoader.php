<?php


namespace Cheezykins\AdventOfCode2020\Day4;


class PassportLoader
{
    protected array $passports;

    public function __construct(array $passports)
    {
        $this->passports = $passports;
    }

    public static function loadFromString(string $input): self
    {
        $entries = explode("\n\n", $input);
        $passports = [];
        foreach ($entries as $entry) {
            $lines = explode("\n", $entry);
            $keyValuePairs = [];
            $fields = [];
            foreach ($lines as $line) {
                $keyValuePairs = array_merge($keyValuePairs, explode(' ', $line));
            }
            foreach ($keyValuePairs as $keyValuePair) {
                $components = explode(':', $keyValuePair);
                $fields[$components[0]] = $components[1];
            }
            $passports[] = new Passport($fields);
        }
        return new self($passports);
    }

    public function getValidPassports(): array
    {
        return array_filter($this->passports, fn(Passport $p) => $p->isValid());
    }

    public function countValidPassports(): int
    {
        return count($this->getValidPassports());
    }
}
