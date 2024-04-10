<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
     * The business that owns this Client
     */
    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
