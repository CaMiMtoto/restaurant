<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@platform.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password'),
            'is_super_admin' => true,
        ]);
    }
}
