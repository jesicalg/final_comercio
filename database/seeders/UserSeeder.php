<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'user_id' => 1,
                'email' => 'admin@admin.com',
                'password'=>Hash::make('admin'),
                'role' => 'admin',
                'username' => 'Admin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'user_id' => 2,
                'email' => 'juan.perez@example.com',
                'password'=>Hash::make('prueba'),
                'username' => 'Juan',
                'role' => null,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'user_id' => 3,
                'email' => 'maria.gomez@example.com',
                'password'=>Hash::make('prueba'),
                'username' => 'Maria',
                'role' => null,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
        ]);
    }
}
