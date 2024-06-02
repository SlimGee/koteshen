<?php

namespace App\Processes;

use App\Pipeline\Contracts\Transport;
use MichaelRubel\EnhancedPipeline\Pipeline;

abstract class Process
{
    protected array $tasks = [];

    public function run(Transport $transport): mixed
    {
        return Pipeline::make()
            ->withEvents()
            ->withTransaction()
            ->send(
                passable: $transport
            )
            ->through(
                pipes: $this->tasks
            )
            ->thenReturn();
    }
}
