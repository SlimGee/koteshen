<?php

namespace App\Models;

use App\Enum\InvoiceStatus;
use App\Events\InvoiceSaved;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Invoice extends Model
{
    use HasFactory, LogsActivity, Searchable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast
     */
    protected $casts = [
        'status' => InvoiceStatus::class,
        'due_at' => 'datetime',
        'date' => 'datetime',
        'emailed' => 'boolean',
        'emailed_at' => 'datetime',
        'total' => 'float',
        'balance' => 'float',
        'subtotal' => 'float',
    ];

    /**
     * The attributes that should be eager loaded
     *
     * @var array
     */
    protected $with = ['currency'];

    protected $dispatchesEvents = [
        'saved' => InvoiceSaved::class,
    ];

    /**
     * Get the items for the invoice.
     */
    public function items(): MorphMany
    {
        return $this->morphMany(Item::class, 'itemable');
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
        return Attribute::make(set: fn($value = null) => $value ?: 'INV-' . strtoupper(bin2hex(random_bytes(2))) . '-' . random_int(1000, 9999));
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'due_at' => $this->due_at?->format('d M Y'),
            'days_due' => $this->due_at?->diffInDays(now()),
        ]);
    }

    /**
     * The comments for this Model
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }

    /**
     * Scope a query to only include services matching the search term.
     */
    public function scopeWhereScout(Builder $query, string $search): Builder
    {
        return $query->whereIn(
            'id',
            self::search($search)
                ->get()
                ->pluck('id'),
        );
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->setDescriptionForEvent(fn(string $eventName) => "Invoice has been {$eventName}")
            ->logUnguarded();
    }

    /**
     * Get the subscription for the invoice.
     */
    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    /**
     * Get the payments for the invoice.
     */
    public function payments(): MorphMany
    {
        return $this->morphMany(Payment::class, 'payable');
    }
}
