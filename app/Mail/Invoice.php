<?php

namespace App\Mail;

use App\Http\Controllers\User\OrderController;
use App\Models\Order\Order;
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
    protected $invoice;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, string $invoice)
    {
        $this->order = $order;
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice')->with([
            'userName' => $this->order->user->name,
            'orderId' => $this->order->id,
            'totalPrice' => $this->order->total_price,
            'address' => $this->order->address,
            'additionalInformation' => $this->order->additional_information,
//        ])->attach('/path/to/file', ['as' => "invoice.pdf"]);
//        ])->attachFromStorage('/path/to/file', 'name.pdf', ['as' => "invoice.pdf"]); // что будет работать?
        ])->attachData($this->getPDF($this->order), 'smart-store-order-no-' . $this->order->id);
    }

    private function getPDF(Order $order)
    {
        return OrderController::class->generateInvoicePDF($order);
    }
}
