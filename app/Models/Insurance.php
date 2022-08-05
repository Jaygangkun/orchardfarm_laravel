<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurances';

    protected $fillable = [
        'name',
        'plan_type',
        'policy_amount',
        'anniversary_date',
        'frequency',
        'contact_details',
        'comments'
    ];
}
