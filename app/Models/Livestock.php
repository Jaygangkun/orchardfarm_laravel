<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestocks';

    protected $fillable = [
        'tag',
        'name',
        'image',
        'type',
        'breed',
        'stage',
        'gender',
        'date_of_birth',
        'age',
        'weight',
        'source',
        'mother_tag',
        'father_tag',
        'comments'
    ];
}
