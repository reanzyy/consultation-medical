<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'consultan',
                'email' => 'consultan@example.com',
                'role' => 'consultan',
                'password' => bcrypt('consultan'),
            ],
            [
                'name' => 'doctor',
                'email' => 'doctor@example.com',
                'role' => 'doctor',
                'password' => bcrypt('doctor'),
            ],
        ]);
    }
}
