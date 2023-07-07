<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthdate',
        'email',
        'contact_number',
        'emergency_contact_name',
        'emergency_contact_number'
    ];

    protected $dates = [
        'birthdate'
    ];
}
