<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    protected $fillable = [
        'name', 'genre', 'description', 'visibility', 'user_id',
    ];
    //
}