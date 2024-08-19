<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create order-product relationships
        foreach (range(1, 20) as $orderId) {
            $productIds = Product::inRandomOrder()->take(rand(1, 5))->pluck('id'); // Random products for each order

            foreach ($productIds as $productId) {
                DB::table('order_product')->insert([
                    'order_id' => $orderId,
                    'product_id' => $productId,
                ]);
            }
        }
    }
}
