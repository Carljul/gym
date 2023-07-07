<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FitnessInformation extends Model
{
    use HasFactory;
    
    protected $table = 'fitness_informations';

    protected $fillable = [
        'person_id',
        'allergies',
        'injuries',
        'medical_condition'
    ];
}
