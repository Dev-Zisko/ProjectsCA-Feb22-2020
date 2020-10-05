<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Godparent extends Model
{
    protected $fillable = [
        'name', 'state', 'curriculum', 'type',
    ];
}
