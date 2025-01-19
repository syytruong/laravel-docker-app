<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Jobs\SendSubscriptionToThirdParty;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'basket' => 'required|array',
            'basket.*.name' => 'required|string',
            'basket.*.type' => 'required|string',
            'basket.*.price' => 'required|numeric',
        ]);

        $order = Order::create($validated);

        foreach ($validated['basket'] as $item) {
            if ($item['type'] === 'subscription') {
                SendSubscriptionToThirdParty::dispatch($item);
            }
        }

        return response()->json($order, 201);
    }
}