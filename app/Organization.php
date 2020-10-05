<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'id_organization', 'name', 'state', 'type', 'person_contact', 'person_position',
        'person_mail', 'person_cellphone',
    ];
}
