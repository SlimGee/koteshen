<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that should not be mass assignable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the commentable Model
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the comments for this comment
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
