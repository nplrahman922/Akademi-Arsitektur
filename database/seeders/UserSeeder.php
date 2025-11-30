<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::updateOrCreate([
            'name' => 'userTest',
            'email' => 'userTest@example.com',
            'password' => bcrypt('user123'),
            'role' => 'user',
            'expired_at' => null,
        ]);
    }
}
