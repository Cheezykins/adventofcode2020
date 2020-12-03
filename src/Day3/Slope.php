<?php


namespace Cheezykins\AdventOfCode2020\Day3;


class Slope
{

    protected array $rows;

    protected int $width;
    protected int $height;

    protected Sled $sled;

    public function __construct(array $rows)
    {
        $this->rows = $rows;
        $this->height = count($this->rows);
        $this->width = count($this->rows[0]);
        $this->sled = new Sled();
    }

    public static function loadFromString(string $slopeDefinition): self
    {
        $rows = explode("\n", $slopeDefinition);
        $processedRows = [];
        foreach ($rows as $row)
        {
            $processedRows[] = str_split($row);
        }

        return new self($processedRows);
    }

    public function isTree(int $x, int $y)
    {
        if ($x >= $this->width) {
            $x %= $this->width;
        }
        if ($this->rows[$y][$x] === '#') {
            return true;
        }
        return false;
    }

    public function journey(int $right = 1, int $down = 1): int
    {
        $this->sled->setPath($right, $down);
        $trees = 0;
        while ($this->sled->getY() < $this->height) {
            $trees += (int)$this->isTree($this->sled->getX(), $this->sled->getY());
            $this->sled->advance();
        }
        return $trees;
    }
}
