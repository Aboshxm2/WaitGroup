<?php

declare(strict_types=1);

namespace Aboshxm2\WaitGroup;

use Closure;

class WaitGroup
{
    private int $count = 0;
    private Closure $then;

    public function add(int $count): void
    {
        $this->count += $count;
    }

    public function done(): void
    {
        $this->count -= 1;

        if($this->count <= 0) {
            ($this->then)();
        }
    }

    public function wait(Closure $then): void
    {
        if($this->count <= 0) {
            $then();

            return;
        }

        $this->then = $then;
    }
}