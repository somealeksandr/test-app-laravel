<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

interface ProductServiceInterface
{
    /**
     * Get a list of products purchased by the user recently.
     *
     * @param  User $user
     * @return Collection
     */
    public function getRecentPurchasedProducts(User $user): Collection;

    /**
     * Get the most popular products.
     *
     * @return Collection
     */
    public function getPopularProducts(): Collection;
}
