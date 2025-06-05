<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $user = \App\Models\User::create([
        'name' => 'Super Admin',
        'email' => 'superadmin@mailinator.com',
        'password' => bcrypt('admin@123'),
    ]);

    $user->assignRole('SuperAdmin');

    }
}
