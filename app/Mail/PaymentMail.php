<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payments, $name, $service, $booking_id, $unit_cost, $vat;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payments, $name, $service, $booking_id, $unit_cost, $vat)
    {
        $this->payments = $payments;
        $this->name = $name;
        $this->service = $service;
        $this->booking_id = $booking_id;
        $this->unit_cost = $unit_cost;
        $this->vat = $vat;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Email.payment')->with(array('payments' =>$this->payments , 'name' => $this->name, 'service' => $this->service, 'booking_id' => $this->booking_id, 'unit_cost' => $this->unit_cost, 'vat' => $this->vat));
    }
}
