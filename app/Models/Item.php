<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable
     */
    protected $guarded = [];

    /**
     * The itemable Model
     */
    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }
}
