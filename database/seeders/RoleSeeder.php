<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Khai báo Model ở đây

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Quản trị viên'
        ]);

        Role::create([
            'name' => 'customer',
            'description' => 'Khách hàng'
        ]);
    }
}