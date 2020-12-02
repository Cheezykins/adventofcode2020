<?php


namespace Cheezykins\AdventOfCode2020\Day2;


class PasswordDatabase
{

    /** @var PasswordDatabaseEntry[]|array $entries */
    protected array $entries;

    public function __construct(array $entries)
    {
        $this->entries = $entries;
    }

    public static function loadFromString(string $databaseFile, string $rule): self
    {
        $entryStrings = explode("\n", $databaseFile);
        $entries = [];
        foreach ($entryStrings as $key => $entry) {
            $entries[] = new PasswordDatabaseEntry($entry, $rule);
        }
        return new self($entries);
    }

    /**
     * @return PasswordDatabaseEntry[]\array
     */
    public function getValidEntries(): array
    {
        return array_filter($this->entries, fn($entry) => $entry->isValid());
    }

    public function countValidEntries(): int
    {
        return count($this->getValidEntries());
    }
}
