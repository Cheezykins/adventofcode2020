<?php


namespace Cheezykins\AdventOfCode2020\Day5;


class Plane
{

    /** @var array|BoardingPass[] */
    protected array $boardingPasses = [];

    public function loadBoarders(array $boarders)
    {
        foreach ($boarders as $boarder) {
            $this->boardingPasses[] = new BoardingPass($boarder);
        }
        usort($this->boardingPasses, fn(BoardingPass $a, BoardingPass $b) => $a->getSeatId() <=> $b->getSeatId());
    }

    public function getHighestSeatId(): int
    {
        $highest = 0;
        foreach ($this->boardingPasses as $pass) {
            if ($pass->getSeatId() > $highest) {
                $highest = $pass->getSeatId();
            }
        }
        return $highest;
    }

    /**
     * @return int|null
     */
    public function findMissingSeat(): ?int
    {
        foreach ($this->boardingPasses as $index => $pass) {
            if (array_key_exists($index + 1, $this->boardingPasses) && $this->boardingPasses[$index + 1]->getSeatId() === $pass->getSeatId() + 2) {
                return $pass->getSeatId() + 1;
            }
        }
        return null;
    }
}