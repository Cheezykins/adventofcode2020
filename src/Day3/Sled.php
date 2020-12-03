<?php


namespace Cheezykins\AdventOfCode2020\Day3;


class Sled
{
    protected int $x = 0;
    protected int $y = 0;

    protected int $right = 1;
    protected int $down = 1;

    public function setPath(int $right, int $down)
    {
        $this->reset();
        $this->right = $right;
        $this->down = $down;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function advance()
    {
        $this->x += $this->right;
        $this->y += $this->down;
    }

    protected function reset()
    {
        $this->x = 0;
        $this->y = 0;
    }
}
