<?php


namespace Cheezykins\AdventOfCode2020\Day2;


use Cheezykins\AdventOfCode2020\Day2\Rules\PasswordRule;

class PasswordDatabaseEntry
{

    protected PasswordRule $rule;
    protected string $password;

    public function __construct(string $entryCode, string $rule)
    {
        $this->parseEntryCode($entryCode, $rule);
    }

    protected function parseEntryCode(string $entryCode, string $rule): void
    {
        $matches = [];
        if (!preg_match('/^(\d+)-(\d+) (.): (.+)$/', $entryCode, $matches)) {
            throw new \Exception('Invalid Database Entry: ' . $entryCode);
        }

        $this->rule = new $rule((int)$matches[1], (int)$matches[2], $matches[3]);
        $this->password = $matches[4];
    }

    public function isValid(): bool
    {
        return $this->rule->test($this->password);
    }

}
