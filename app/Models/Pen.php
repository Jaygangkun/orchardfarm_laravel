<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pen extends Model
{
    use HasFactory;

    protected $table = 'pens';

    protected $fillable = [
        'name',
        'animal_type',
        'location',
        'comments'
    ];
}
