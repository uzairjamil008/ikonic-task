<?php

namespace Database\Seeders;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role', 'User')->first();
        $data = [
            [
                'title' => 'hy',
                'description' => 'dummy1',
                'category' => 'Feature Request',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'hello',
                'description' => 'dummy2',
                'category' => 'Bug Report',
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Feedback::insert($data);
    }
}
