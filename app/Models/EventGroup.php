<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGroup extends Model
{
    use HasFactory;

    protected $table = 'event_groups';

    protected $fillable = [
        'name',
        'animal_type',
        'type',
        'start_date',
        'frequency',
        'comments'
    ];
}
