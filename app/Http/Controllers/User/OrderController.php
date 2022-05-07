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
use Stripe\EphemeralKey;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

// This is your test secret API key.
Stripe::setApiKey('sk_test_51KvcFqIwdOpAH80orZnTKwfhrww10bFcNdvW5QXe50PzHpBf7odkLcgJ41qBOvzHnSzOM612bkhWcCRKSBoRynFt00RK7x0ssO');

class OrderController extends Controller
{
    public function getAllOrders()
    {
        $user = Auth::user();

        $orders = Order::whereUserId($user->id)->get();

        foreach ($orders as $order) {
            $order->user_id = $order->user;
            $orderProducts = OrderProduct::whereOrderId($order->id)->get();
            foreach ($orderProducts as $orderProduct) {
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

        foreach ($orderProducts as $orderProduct) {
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

    /**
     * @throws ApiErrorException
     */
    public function createOrder(Request $request)
    {
        $user = Auth::user();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $delivery_method = $request->get("delivery_method");
        $payment_method = $request->get("payment_method");

        if ($delivery_method === "Delivery to address") {
            $address = $request->get("address");
            $delivery_price = 1000;
        } else {
            $address = null;
            $delivery_price = 0;
        }

        $cart = Cart::whereUserId($user->id)->first();
        $cartProducts = CartProduct::whereCartId($cart->id)->get();

        $order = new Order();
        $order->status = "Waiting for confirmation";
        $order->user_id = $user->id;
        $order->total_price = $cart->total_price + $delivery_price;
        $order->payment_method = $payment_method;
        $order->delivery_method = $delivery_method;
        $order->address = $address;
        if ($request->has("additional_information")) {
            $order->additional_information = $request->get("additional_information");
        }
        $order->delivery_price = $delivery_price;
        if ($order->save()) {
            foreach ($cartProducts as $cartProduct) {
                $orderProduct = new OrderProduct();
                $orderProduct->order_id = $order->id;
                $orderProduct->item_id = $cartProduct->item_id;
                $orderProduct->item_amount = $cartProduct->item_amount;
                $orderProduct->save();
            }
            $cart->total_price = 0;
            $cart->save();
            CartProduct::whereCartId($cart->id)->delete();

            $ephemeralKey = EphemeralKey::create(
                [
                    'customer' => $user->stripe_id,
                ],
                [
                    'stripe_version' => '2020-08-27',
                ]);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = PaymentIntent::create([
                'amount' => $order->total_price,
                'currency' => 'kzt',
                'customer' => $user->stripe_id,
                'receipt_email' => $user->email,
                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
            ]);

            $data = [
                'client_id' => $user->stripe_id,
                'clientSecret' => $paymentIntent->client_secret,
                'clientEphemeral' => $ephemeralKey,
                'order' => $order,
            ];

            return response()->json($data);
        }
        return response()->json()->isServerError();
    }

//    public function updateOrder(Request $request){
//
//    }

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

    /**
     * @throws ApiErrorException
     */
    public function createPaymentIntent($order_id)
    {
        $user = Auth::user();
        $order = Order::whereId($order_id)->first();

        // Create a PaymentIntent with amount and currency
        $ephemeralKey = EphemeralKey::create(
            [
                'customer' => $user->id,
            ],
            [
                'stripe_version' => '2020-08-27',
            ]);

        $paymentIntent = PaymentIntent::create([
            'amount' => $order->total_price,
            'currency' => 'kzt',
            'customer' => $user->id,
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
            'clientEphemeral' => $ephemeralKey,
        ];

        return response()->json($output);
    }

}
