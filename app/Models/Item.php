<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable
     */
    protected $guarded = [];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
