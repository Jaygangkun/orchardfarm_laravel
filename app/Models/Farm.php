<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'farms';

    protected $fillable = [
        'code',
        'name',
        'address',
        'contact_name',
        'contact_phone',
        'email',
        'website',
        'location_lat',
        'location_lng',
        'image'
    ];
}
