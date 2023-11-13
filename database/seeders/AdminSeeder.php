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
    public function run(): void
    {
        $data = [
            [
                'role' => 'Super Admin',
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        User::insert($data);
    }
}
