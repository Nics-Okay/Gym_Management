<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration_value',
        'duration_unit',
        'price',
        'availed_by',
    ];
/*
    protected $casts = [
        'duration_value' => 'integer',
    ];
    */
}

/* HasFactory
    makes testing and populating your database
    with sample data much easier and more efficient.
*/