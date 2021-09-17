<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlaceOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $email_order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->email_order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bacs.balazs@ionutunguru.ro')
            ->subject('BookMag - Comanda plasata ')
            ->view('emails/placeorder')
            ->with(['order' => $this->email_order]);
    }
}
