<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Models\User\CartProduct;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrder()
    {
        $user = Auth::user();

        $order = Order::whereUserId($user->id)->get();
        $orderProducts = OrderProduct::whereOrderId($order->id)->get();

        $data = [
            "order" => $order,
            "orderProducts" => $orderProducts];

        return response()->json($data);
    }

    public function clearOrder()
    {

    }

    public function deleteOrder()
    {

    }

    public function updateOrder()
    {

    }
}
