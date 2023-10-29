<?php

namespace App\Listeners;

use App\Events\ProductUpdatingEvent;
use App\Exceptions\PermissionException;
use App\Models\User;

class ProductUpdatingListener
{
    public function handle(ProductUpdatingEvent $event)
    {
        $user = auth()->user();

        if (!$user || $user->type != User::ADMIN_TYPE) {
            throw new PermissionException('Access denied');
        }

        $product = $event->getProduct();
        $product->active = 0;
    }
}
