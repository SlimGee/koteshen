<?php

namespace App\Models;

use App\Enum\ClientType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes aren't mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast
     *
     * @var array
     */
    protected $casts = [
        'type' => ClientType::class,
    ];

    /**
     * The attributes that should be eager loaded
     *
     * @var array
     */
    protected $with = ['currency'];

    /**
     * The business that owns this Client
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    /**
     * The currency for this client
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(get: fn($value, $attributes) => is_null($value) ? $attributes['first_name'] . ' ' . $attributes['last_name'] : $value);
    }

    public function contact(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
        );
    }

    public function estimates(): HasMany
    {
        return $this->hasMany(Estimate::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
