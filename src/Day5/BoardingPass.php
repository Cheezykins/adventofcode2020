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
        $binary = str_replace(['F', 'B', 'L', 'R'],['0', '1', '0', '1'], $this->code);

        $rowCode = substr($binary, 0, 7);
        $columnCode = substr($binary, 7, 3);

        $this->row = bindec($rowCode);
        $this->column = bindec($columnCode);
        $this->seatId = $this->row * 8 + $this->column;
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