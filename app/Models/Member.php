<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'contact_number',
        'address',
        'membership_status',
        'availed_membership',
        'membership_validity',
        'access_type',
        'is_in_gym',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
