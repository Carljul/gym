<?php

namespace Database\Seeders;

use Hash;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gym Administrator',
            'email' => 'gymadmin@gym.com',
            'password' => Hash::make('password'),
        ]);
    }
}
