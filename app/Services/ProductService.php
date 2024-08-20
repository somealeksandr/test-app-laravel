<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductServiceInterface
{
    public function getRecentPurchasedProducts(User $user): Collection
    {
        $date = Carbon::now()->subDays(30);

        return $user->orders()
                    ->where('created_at', '>=', $date)
                    ->with('products')
                    ->get()
                    ->flatMap(function ($order) {
                        return $order->products;
                    })
                    ->unique('id');
    }

    public function getPopularProducts(): Collection
    {
        $cacheKey = config('cache_keys.popular_products.key');
        $cacheDuration = config('cache_keys.popular_products.duration');

        return Cache::remember($cacheKey, $cacheDuration, function () {
            $date = Carbon::now()->subMonth();

            return Product::withCount(['orders' => function ($query) use ($date) {
                $query->where('created_at', '>=', $date);
            }])
                ->orderBy('orders_count', 'desc')
                ->take(10)
                ->get();
        });
    }
}
