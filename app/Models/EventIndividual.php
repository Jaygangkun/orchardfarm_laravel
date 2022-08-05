<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventIndividual extends Model
{
    use HasFactory;

    protected $table = 'event_individuals';

    protected $fillable = [
        'name',
        'tag',
        'type',
        'date',
        'comments'
    ];
}
