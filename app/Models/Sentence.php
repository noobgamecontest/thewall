<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'author', 'content', 'exposed_at',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'exposed_at',
    ];
}
