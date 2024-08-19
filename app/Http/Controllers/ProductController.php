<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    /**
     * Get a list of products purchased by the user in the last 30 days.
     *
     * @param  User $user
     * @return ResourceCollection
     */
    public function getRecentPurchasedProducts(User $user): ResourceCollection
    {
        $date = Carbon::now()->subDays(30);

        $products = $user->orders()
            ->where('created_at', '>=', $date)
            ->with('products')
            ->get()
            ->flatMap(function ($order) {
                return $order->products;
            })
            ->unique('id');

        return ProductResource::collection($products);
    }
}
