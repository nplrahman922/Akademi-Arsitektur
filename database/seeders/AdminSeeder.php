<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminemail = env('ADMIN_EMAIL');
        $adminpassword = env('ADMIN_PASSWORD');

        if (!$adminemail || !$adminpassword ) {
            $this->command->warn('Admin email or password not set in .env file.');;
        }

        User::updateOrCreate([
            'name' => 'SipalingAdmin',
            'email' => $adminemail,
            'password' => $adminpassword,
            'role' => 'admin',
            'expired_at' => null,
        ]);
    }
}
