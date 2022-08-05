<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    use HasFactory;

    protected $table = 'animal_types';

    protected $fillable = [
        'name',
        'image',
        'gestation_days',
        'adult_months',
        'kids_months',
        'comments'
    ];
}
