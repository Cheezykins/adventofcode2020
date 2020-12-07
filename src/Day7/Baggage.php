<?php


namespace Cheezykins\AdventOfCode2020\Day7;


class Baggage
{

    /** @var array|Bag[] $bags */
    protected array $bags = [];

    public function __construct(array $bags)
    {
        $this->bags = $bags;
    }

    public static function loadFromString(string $input): self
    {
        /** @var array|Bag[] $bags */
        $bags = [];
        foreach (explode("\n", $input) as $line)
        {
            $matches = [];
            preg_match('/(.+) bags contain (.+)\./', $line, $matches);
            [, $bagName, $subBagNames] = $matches;
            if (!array_key_exists($bagName, $bags)) {
                $bags[$bagName] = new Bag($bagName);
            }
            if ($subBagNames == 'no other bags') {
                continue;
            }
            $subBagNames = explode(', ', $subBagNames);
            foreach ($subBagNames as $subBag) {
                $matches = [];
                preg_match('/(\d+) (.+) bags?/', $subBag, $matches);
                [, $count, $type] = $matches;
                if (!array_key_exists($type, $bags)) {
                    $bags[$type] = new Bag($type);
                }
                $bags[$bagName]->addBag($bags[$type], (int)$count);
            }
        }
        return new self($bags);
    }

    public function countUniqueContainersOfBag(string $bagName): int
    {
        $bag = $this->bags[$bagName];
        return $bag->countUniqueContainers();
    }

    public function countContentsOfBag(string $bagName): int
    {
        $bag = $this->bags[$bagName];
        return $bag->countContents();
    }
}
