<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'profile_id' => 'PNB2023101',
            'role_id' => 1, // Assuming admin role ID is 1
            'name' => 'Admin',
            'email' => 'admin@spotlightz.com',
            'password' => bcrypt('password'),
            'phone_no' => 123456789,
            'profile_img' => null,
            'active_status' => 1,
            'created_by' => null,
            'login_ip' => 'asdf1232',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'profile_id' => 'PNB2023102',
            'role_id' => 2, // Assuming another role ID
            'name' => 'Warehouse',
            'email' => 'warehouse@spotlightz.com',
            'password' => bcrypt('password'),
            'phone_no' => 987654321,
            'profile_img' => null,
            'active_status' => 1,
            'created_by' => null,
            'login_ip' => 'asdf1232',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'profile_id' => 'PNB2023103',
            'role_id' => 3, // Assuming another role ID
            'name' => 'Client',
            'email' => 'client@spotlightz.com',
            'password' => bcrypt('password'),
            'phone_no' => 555555555,
            'profile_img' => null,
            'active_status' => 1,
            'created_by' => null,
            'login_ip' => 'asdf1232',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
