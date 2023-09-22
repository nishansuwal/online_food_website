<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=[
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('1'),

        ];
        Admin::create($admin);
    }
}
