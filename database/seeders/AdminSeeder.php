<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $email = 'meh@gmail.com'; // Change this to your desired email.

        // Check if the user with this email already exists.
        $admin = DB::table('users')->where('email', $email)->first();

        if (!$admin) {
            // Insert a new admin if not found.
            DB::table('users')->insert([
                'email' => $email,
                'role' => 'customer',
                'password' => Hash::make('password'),
                'admin_pin' => Hash::make('123456'),
            ]);
        } else {
            // Update the existing admin's information.
            DB::table('users')->where('email', $email)->update([
                'role' => 'customer', // Ensure the role is explicitly set.
                'admin_pin' => null, // Update the PIN.
                'password' => $admin->password
                
                // Hash::make('newpassword'),  Update password if needed.
            ]);
        }
    }
}

// You don't have a purpose to be here.
