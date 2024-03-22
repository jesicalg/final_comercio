<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'relation_id' => 1,
                'user_id' => 2,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
