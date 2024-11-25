<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

/**
 * Product Updated Event
 *
 * @class App\Events\ProductUpdated
 * @package App\Events
 */
class ProductUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var Product
     */
    public Product $product;

    /**
     * @var string
     */
    public string $action;

    /**
     * @param Product $product
     * @param string $action
     */
    public function __construct(Product $product, string $action)
    {
        $this->product = $product;
        $this->action = $action;
    }

    /**
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('products');
    }

    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'product.event';
    }
}
