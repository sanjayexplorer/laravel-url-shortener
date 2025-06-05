<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
     Role::create(['name' => 'SuperAdmin']);
     Role::create(['name' => 'Admin']);
     Role::create(['name' => 'Member']);
     $this->call(SuperAdminSeeder::class);
    }
}
