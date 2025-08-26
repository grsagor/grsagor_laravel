<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'reviewer_id',
        'review',
        'rating',
        'status',
    ];

    // Relationships
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
