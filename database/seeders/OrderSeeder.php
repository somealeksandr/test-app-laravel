<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 orders
        foreach (range(1, 100) as $index) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 10),
                'created_at' => now()->subDays(rand(1, 30)), // Orders from the last 30 days
                'updated_at' => now(),
            ]);
        }
    }
}
