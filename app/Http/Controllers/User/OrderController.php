<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Models\Product\Product;
use App\Models\User\Cart;
use App\Models\User\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getAllOrders()
    {
        $user = Auth::user();

        $orders = Order::whereUserId($user->id)->get();

        foreach ($orders as $order) {
            $order->user_id = $order->user;
            $orderProducts = OrderProduct::whereOrderId($order->id)->get();
            foreach ($orderProducts as $orderProduct){
                $product = Product::whereId($orderProduct->item_id)->first();
                $product->brand_id = $product->brand;
                $product->category_id = $product->category;
                $product->subcategory_id = $product->subcategory;
                $product->image_url = asset('storage/' . $product->image_url);
                $orderProduct->item_id = $product;
            }
            $data[] = [
                "order" => $order,
                "orderProducts" => $orderProducts];
        }

        return response()->json($data);
    }

    public function getOrder(Request $request)
    {
        $user = Auth::user();
        $orderId = $request->input("order_id");

        $order = Order::whereId($orderId)->first();
        $order->user_id = $order->user;

        $orderProducts = OrderProduct::whereOrderId($order->id)->get();

        foreach ($orderProducts as $orderProduct){
            $product = Product::whereId($orderProduct->item_id)->first();
            $product->brand_id = $product->brand;
            $product->category_id = $product->category;
            $product->subcategory_id = $product->subcategory;
            $product->image_url = asset('storage/' . $product->image_url);
            $orderProduct->item_id = $product;
        }

        $data = [
            "order" => $order,
            "orderProducts" => $orderProducts];

        return response()->json($data);
    }

    public function createOrder(Request $request)
    {
        $user = Auth::user();
        $delivery_method = $request->get("delivery_method");
        $payment_method = $request->get("payment_method");
        $additional_information = $request->get("additional_information");

        if ($delivery_method === "доставка по адресу") {
            $address = $request->get("address");
            $delivery_price = 1000;
        } else {
            $address = null;
            $delivery_price = 0;
        }

        $cart = Cart::whereUserId($user->id)->first();
        $cartProducts = CartProduct::whereCartId($cart->id)->get();

        $order = new Order();
        $order->status = "Ожидает подтверждения";
        $order->user_id = $user->id;
        $order->total_price = $cart->total_price + $delivery_price;
        $order->payment_method = $payment_method;
        $order->delivery_method = $delivery_method;
        $order->address = $address;
        $order->additional_information = $additional_information;
        $order->delivery_price = $delivery_price;
        if ($order->save()) {
            foreach ($cartProducts as $cartProduct) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order->id;
                $orderProduct->item_id = $cartProduct->item_id;
                $orderProduct->item_amount = $cartProduct->item_amount;
                $orderProduct->save();
            }
            return response()->json($order);
        }
        return response()->json()->isServerError();
    }

    public function deleteOrder(Request $request)
    {
        $user = Auth::user();
        $orderId = $request->get("order_id");

        $order = Order::whereId($orderId)->first();
        $order->status = "Отменен";

        if ($order->save()) {
            return response()->json($order);
        }
        return response()->json()->isServerError();
    }

}
