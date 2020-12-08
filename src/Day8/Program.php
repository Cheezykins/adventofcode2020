<?php


namespace Cheezykins\AdventOfCode2020\Day8;


class Program
{
    protected int $cursor = 0;
    protected int $accumulator = 0;

    /** @var array|Instruction[] */
    protected array $instructions;

    public function __construct(array $instructions)
    {
        $this->instructions = $instructions;
    }

    protected function reset(): void
    {
        $this->accumulator = 0;
        $this->cursor = 0;
        foreach ($this->instructions as $instruction) {
            $instruction->reset();
        }
    }

    public function moveCursor(int $change): void
    {
        $this->cursor += $change;
    }

    public function changeAccumulator(int $change): void
    {
        $this->accumulator += $change;
    }

    public static function loadFromString(string $input): self
    {
        $lines = explode("\n", $input);

        $instructions = [];

        foreach ($lines as $line) {
            [$operation, $argument] = explode(" ", $line);
            $instructions[] = new Instruction($operation, $argument);
        }

        return new self($instructions);
    }

    public function run(): int
    {
        $this->reset();
        $instructionCount = count($this->instructions);
        while ($this->cursor < $instructionCount) {
            $this->instructions[$this->cursor]->visit($this);
        }
        return $this->accumulator;
    }

    public function runSequence(): int
    {
        $accumulator = 0;
        foreach ($this->instructions as $instruction) {
            $instruction->flipInstruction();
            try {
                $accumulator = $this->run();
                break;
            } catch (\Exception $exception) {
                $instruction->flipInstruction();
                continue;
            }
        }
        return $accumulator;
    }

    public function getAccumulator(): int
    {
        return $this->accumulator;
    }
}
