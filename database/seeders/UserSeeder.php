<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $user=[
            'name'=>'test',
            'email'=>'test@gmail.com',
            'password'=>bcrypt('1'),
            'address'=>'test',
            'address'=>'test',
            'phone'=>'2075',
            


        ];
        User::create($user);
    
    }
}
