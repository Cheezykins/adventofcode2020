<?php


namespace Cheezykins\AdventOfCode2020\Day5;


class BoardingPass
{
    protected string $code;
    protected int $seatId;
    protected int $row;
    protected int $column;

    public function __construct(string $code)
    {
        $this->code = $code;
        $this->parseCode();
    }

    protected function parseCode(): void
    {
        $rowCode = substr($this->code, 0, 7);
        $columnCode = substr($this->code, 7, 3);

        $this->row = $this->reduceCode(str_split($rowCode), 0, 127,'F');
        $this->column = $this->reduceCode(str_split($columnCode), 0, 7, 'L');
        $this->seatId = $this->row * 8 + $this->column;
    }

    protected function reduceCode(array $codeCharacters, int $lowerBound, int $upperBound, string $lowerCharacter): int
    {
        foreach ($codeCharacters as $character) {
            if ($character === $lowerCharacter) {
                $upperBound = $lowerBound + ceil(($upperBound - $lowerBound) / 2);;
            } else {
                $lowerBound = $upperBound - floor(($upperBound - $lowerBound) / 2);;
            }
        }
        return $lowerBound;
    }

    public function getRow(): int
    {
        return $this->row;
    }

    public function getColumn(): int
    {
        return $this->column;
    }

    public function getSeatId(): int
    {
        return $this->seatId;
    }
}