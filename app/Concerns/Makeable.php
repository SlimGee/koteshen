<?php

namespace App\Concerns;

trait Makeable
{
    public static function make(): static
    {
        return app(static::class);
    }
}
