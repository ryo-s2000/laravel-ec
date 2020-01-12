<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $dates = [
        'release'
    ];
    protected $fillable = [
        'title',
        'description',
        'price',
        'imagespath',
        'release',
        'updated_at'
    ];
}
