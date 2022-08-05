<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalStatus extends Model
{
    use HasFactory;

    protected $table = 'animal_status';

    protected $fillable = [
        'tag',
        'name',
        'reason',
        'date',
        'weight',
        'sales_price',
        'comments'
    ];
}
