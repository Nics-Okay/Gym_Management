<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        /* AdminSeeder is registered here */
        $this->call(AdminSeeder::class);
    }
}

// You don't have a purpose to be here.
