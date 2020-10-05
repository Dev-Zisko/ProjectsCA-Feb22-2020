<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $fillable = [
        'name', 'postname', 'status', 'mandatories', 'observation', 'state', 'mandatories',
    ];
}
