<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeleteOrderMail extends Mailable
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
            ->subject('BookMag - Comanda stearsa ')
            ->view('emails/deleteordermail')
            ->with(['order' => $this->email_order]);
    }
}
