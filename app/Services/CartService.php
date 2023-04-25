<?php

namespace App\Services;

use App\Interfaces\CartInterface;
use App\Models\Product;

class CartService implements CartInterface
{
    public function get(): mixed
    {
        // TODO: Implement get() method.
    }

    public function getTotal(): int
    {
        // TODO: Implement getTotal() method.
    }

    public function clear(): void
    {
        // TODO: Implement clear() method.
    }

    public function add(Product $product): void
    {

    }

    public function remove(Product $product): bool
    {
        // TODO: Implement remove() method.
    }

    public function update(Product $product): void
    {
        // TODO: Implement update() method.
    }
}
