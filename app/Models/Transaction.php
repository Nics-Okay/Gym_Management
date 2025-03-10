<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'rate_id',
        'status',
        'validity_start_date',
        'validity_end_date',
        'request_validity',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

    public function user()
{
    return $this->hasOneThrough(User::class, Member::class, 'id', 'id', 'member_id', 'user_id');
}
}
