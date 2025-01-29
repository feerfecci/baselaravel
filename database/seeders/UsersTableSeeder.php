<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'username' => 'feeh@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'gabi@gmail.com',
                'password' => bcrypt('abc123456'),
                'created_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
