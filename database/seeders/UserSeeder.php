<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'username' => 'Admin_001',
            'password' => Hash::make('admin'),
            'avatar' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
