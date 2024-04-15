<?php

namespace App\Models;

use App\Enum\InvoiceStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [];

    protected $casts = [
        'status' => InvoiceStatus::class,
        'due_at' => 'datetime',
    ];

    /**
     * Get the items for the invoice.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    /**
     * The business that owns this invoice
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * The client that owns this invoice
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * The currency for this invoice
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Make the number attribute
     */
    public function number(): Attribute
    {
        return Attribute::make(set: fn($value) => $value ?: 'INV-' . date('mds-Y'));
    }
}
