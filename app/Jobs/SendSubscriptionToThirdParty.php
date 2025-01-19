<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendSubscriptionToThirdParty implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function handle()
    {
        $payload = [
            'ProductName' => $this->item['name'],
            'Price' => $this->item['price'],
            'Timestamp' => now(),
        ];

        Http::post('https://very-slow-api.com/orders', $payload);
    }
}