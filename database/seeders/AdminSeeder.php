<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $email = 'officialnicholeson@gmail.com'; // Target email for updating

        // Find the user with this email
        $admin = User::where('email', $email)->first();

        if ($admin) {
            // Update the existing user's role and clear admin_code if needed
            $admin->update([
                'role' => 'admin', // Update to admin role
                'admin_code' => Hash::make('121212'), // Update admin code
            ]);
        } elseif (!$admin) {
            // User not found, handle appropriately (optional)
            $this->command->info("User with email {$email} does not exist.");
        }
    }
}

// commands: Hash::make('value'), null

// You don't have a purpose to be here.

// RUN: php artisan db:seed --class=AdminSeeder
