<?php


namespace Cheezykins\AdventOfCode2020\Day8;


class Instruction
{

    protected const NOP = 'nop';
    protected const JMP = 'jmp';
    protected const ACC = 'acc';

    protected int $hits = 0;
    protected string $operation;
    protected int $argument;

    public function __construct(string $operation, int $argument)
    {
        $this->operation = $operation;
        $this->argument = $argument;
    }

    public function visit(Program $program): void
    {
        if ($this->hits > 0) {
            throw new \Exception("Already visited!");
        }

        $this->hits++;

        switch ($this->operation) {
            case self::ACC:
                $program->changeAccumulator($this->argument);
            case self::NOP:
                $program->moveCursor(1);
                break;
            case self::JMP:
                $program->moveCursor($this->argument);
                break;
        }
    }

    public function flipInstruction(): void
    {
        if ($this->operation === self::JMP) {
            $this->operation = self::NOP;
        } elseif ($this->operation === self::NOP) {
            $this->operation = self::JMP;
        }
    }

    public function reset(): void
    {
        $this->hits = 0;
    }
}
