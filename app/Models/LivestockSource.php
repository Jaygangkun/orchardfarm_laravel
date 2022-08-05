<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockSource extends Model
{
    use HasFactory;

    protected $table = 'livestock_sources';

    protected $fillable = [
        'name'
    ];
}
