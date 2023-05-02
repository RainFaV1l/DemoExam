<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }

    public function store(Request $request) {

        if(!Hash::check($request->get('password'), auth()->user()->getAuthPassword())) {
            return response()->json([
               'message' => 'Введенный пароль неведействителен для вашей учетной записи',
               'status' => false
            ]);
        }

        if($this->cartService->isEmpty()) return response()->json([
            'message' => 'Невозможно создать пустой заказ!',
            'status' => false,
        ]);

        $order = Order::query()->create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'total' => $this->cartService->getTotal()
        ]);

        foreach ($this->cartService->get() as $item) {
            OrderProduct::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

        Mail::to(auth()->user()->email)->send(new OrderCreatedMail($order));

        return response()->json([
            'message' => 'Order has been created!',
            'status' => true,
//            'redirect_url' => redirect()->route('page.home')
        ]);
    }
}
