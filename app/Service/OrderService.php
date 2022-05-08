<?php

namespace App\Service;

use App\Http\Controllers\User\OrderController;
use App\Models\Order\Order;
use App\Models\Order\OrderProduct;
use App\Models\User\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class OrderService
{
    public function generateInvoicePDF(Order $order)
    {
        $user = User::whereId($order->user_id)->first();
        $orderProducts = OrderProduct::whereOrderId($order->id)->with('products')->get();

        $data = [
            'title' => 'Smart Store Order #' . $order->id . ' ' . $user->name,
            'date' => date('d/m/Y'),
            'user' => $user,
            'order' => $order,
            'orderProducts' => $orderProducts,
        ];

        $pdf = PDF::loadView('email.invoicePDF', $data);

        return $pdf->download('email.invoicePDF');
    }
}
