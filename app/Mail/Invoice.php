<?php

namespace App\Mail;

use App\Http\Controllers\User\OrderController;
use App\Models\Order\Order;
use App\Service\OrderService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    /**
     * The order instance.
     *
     * @var string
     */
    protected $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $pdf)
    {
        $this->order = $order;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice')
            ->subject('Order number: ' . $this->order->id)
            ->with([
                'userName' => $this->order->user->name,
                'orderId' => $this->order->id,
                'totalPrice' => $this->order->total_price,
                'address' => $this->order->address,
                'additionalInformation' => $this->order->additional_information,
            ])
            ->attachData($this->pdf, 'smart-store-order-no-' . $this->order->id . '.pdf');
    }
}
