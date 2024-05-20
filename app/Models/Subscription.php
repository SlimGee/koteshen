<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'ends_at' => 'datetime',
        'starts_at' => 'datetime',
    ];

    /**
     * Get the invoice that owns the subscription.
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the plan that owns the subscription.
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
