<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function update(User $user, Product $product)
    {
        return $product;
    }

    public function delete(User $user, Product $product)
    {
        return $product;
    }
}
