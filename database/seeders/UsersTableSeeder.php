<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'the admin user',
            'email' => 'admincowrihub@yopmail.com',
            'role' => 'admin',
            'password' => Hash::make('1234567890'),
        ]);
    }
}
