<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pantai Pelawan',
            'email' => 'admin@pantaipelawan.com',
            'role' => 'admin',
            'password' => Hash::make('admin12345'),
        ]);
    }
}