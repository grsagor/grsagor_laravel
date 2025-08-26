<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'client_id',
        'title',
        'description',
        'image',
        'github',
        'live',
        'status',
    ];
}
