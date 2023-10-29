<?php

namespace App\Models;

use App\Events\ProductCreatingEvent;
use App\Events\ProductUpdatingEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $dispatchesEvents = [
        'updating' => ProductUpdatingEvent::class,
        'creating' => ProductCreatingEvent::class,
    ];

    public function items(): HasMany
    {
        return $this->hasMany(ProductItem::class);
    }
}
