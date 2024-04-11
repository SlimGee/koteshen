<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [];

    /**
     * Get the items for the invoice.
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class)->withPivot(['quantity', 'price']);
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
