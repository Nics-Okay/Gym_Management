<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Member::create([
            'user_id' => 1,
            'contact_number' => '1234567890',
            'address' => '123 Test Street',
            'membership_status' => 'active',
            'availed_membership' => 'basic',
            'membership_validity' => now()->addYear(),
            'access_type' => 'standard',
        ]);
    }
    
}
