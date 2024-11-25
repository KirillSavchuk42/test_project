<?php

namespace App\Models\Product\Traits;

use App\Events\ProductUpdated;

/**
 * Event Trait
 *
 * @trait App\Models\Product\EventTrait
 * @package App\Models\Product\Traits
 */
trait EventTrait
{
    /**
     * @return void
     */
    protected static function booted(): void
    {
        static::created(function ($product) {
            broadcast(new ProductUpdated($product, 'created'));
        });

        static::updated(function ($product) {
            broadcast(new ProductUpdated($product, 'updated'));
        });

        static::deleted(function ($product) {
            broadcast(new ProductUpdated($product, 'deleted'));
        });
    }
}
