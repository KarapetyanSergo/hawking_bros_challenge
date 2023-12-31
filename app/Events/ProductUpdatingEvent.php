<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;

class ProductUpdatingEvent
{
    use Dispatchable;

    protected Product $product;

    public function __construct (Product $product)
    {
        $this->product = $product;
    }

    public function getProduct (): Product
    {
        return $this->product;
    }
}
