<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Quản trị hệ thống']
        );

        Role::firstOrCreate(
            ['name' => 'staff'],
            ['description' => 'Nhân viên']
        );
    }
}