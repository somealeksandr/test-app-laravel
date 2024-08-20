<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\User;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    public function __construct(private readonly ProductServiceInterface $productService)
    {
    }

    /**
     * Get a list of products purchased by the user in the last 30 days.
     *
     * @param  User $user
     * @return ResourceCollection
     */
    public function getRecentPurchasedProducts(User $user): ResourceCollection
    {
        $products = $this->productService->getRecentPurchasedProducts($user);

        return ProductResource::collection($products);
    }

    /**
     * Get the most popular products.
     *
     * @return ResourceCollection
     */
    public function getPopularProducts(): ResourceCollection
    {
        $products = $this->productService->getPopularProducts();

        return ProductResource::collection($products);
    }
}
