<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class QRCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::whereNull('qr_code_id')->each(function ($user) {
            $user->qr_code_id = Str::uuid(); // Generate unique UUID
            $user->save();
        });
    }
}

