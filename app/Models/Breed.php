<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    protected $table = 'breeds';

    protected $fillable = [
        'animal_type',
        'name',
        'ears',
        'horns',
        'heights',
        'temperament',
        'bearded',
        'fertility_rate',
        'likely_offspring_number',
        'kid_likely_weight',
        'comments'
    ];
}
