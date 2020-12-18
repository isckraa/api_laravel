<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'address',
        'postal_code',
        'city',
        'metro',
        'metro_proximity',
        'deadline_date',
        'additional_options',
        'services'
    ];
}
