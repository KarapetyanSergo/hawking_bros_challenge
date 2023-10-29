<?php

namespace App\Listeners;

use App\Events\ProductCreatingEvent;
use App\Exceptions\PermissionException;
use App\Models\User;

class ProductCreatingListener
{
    public function handle(ProductCreatingEvent $event): void
    {
        $user = auth()->user();

        if (!$user || $user->type != User::ADMIN_TYPE) {
            throw new PermissionException('Access denied');
        }

        $product = $event->getProduct();
        $product->active = 0;
    }
}
