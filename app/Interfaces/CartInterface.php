<?php

namespace App\Interfaces;

use App\Models\Product;

interface CartInterface
{

    public function get(): mixed;

    public function getTotal(): int;

    public function clear(): void;

    public function add(Product $product) : void;

    public function remove(Product $product) : bool;

    public function update(Product $product) : void;

}
