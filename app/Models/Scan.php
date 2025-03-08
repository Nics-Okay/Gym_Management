<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
        'user_id',
        'qr_code_id',
        'name',
        'membership_status',
        'membership_validity',
        'access_type',
        'time_in',
        'time_out',
    ];
}
