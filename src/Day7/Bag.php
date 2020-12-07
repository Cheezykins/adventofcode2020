<?php


namespace Cheezykins\AdventOfCode2020\Day7;


class Bag
{

    /** @var array|Bag[] $contents */
    protected array $contents = [];

    /** @var array|int[] $counts */
    protected array $counts = [];

    /** @var array|Bag[] $containedBy */
    protected array $containedBy = [];
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addBag(Bag $bag, int $count): void
    {
        $this->contents[] = $bag;
        $this->counts[] = $count;
        $bag->setContainer($this);
    }

    protected function setContainer(Bag $bag): void
    {
        $this->containedBy[] = $bag;
    }

    public function getContainers(): array
    {
        $containers = [];
        foreach ($this->containedBy as $container) {
            $containers[] = $container;
            $containers = array_merge($containers, $container->getContainers());
        }
        return $containers;
    }

    public function countContents(): int
    {
        $count = array_sum($this->counts);
        foreach ($this->contents as $index => $content) {
            $count += $this->counts[$index] * $content->countContents();
        }
        return $count;
    }

    public function countUniqueContainers(): int
    {
        return count(array_unique($this->getContainers()));
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
