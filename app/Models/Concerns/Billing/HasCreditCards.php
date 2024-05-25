<?php

namespace App\Models\Concerns\Billing;

use App\Models\Card;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCreditCards
{
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function defaultCard(): Attribute
    {
        return Attribute::make(get: function ($value) {
            return $this->cards()->where('default', true)->first();
        });
    }
}
