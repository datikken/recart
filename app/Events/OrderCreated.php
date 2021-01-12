<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class OrderCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
//        Log::emergency($message);
//        Log::alert($message);
//        Log::critical($message);
//        Log::error($message);
//        Log::warning($message);
//        Log::notice($message);
//        Log::info($message);
//        Log::debug($message);
//
        $this->order = $order;

        Log::info(['new_order_created' => $order]);
    }
}
