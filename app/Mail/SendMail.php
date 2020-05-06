<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due, $car_parking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $serviceName, $eventDate, $createDate, $servicePrice, $tax, $totalAmount, $due, $car_parking)
    {
        $this->name = $name;
        $this->serviceName = $serviceName;
        $this->eventDate = $eventDate;
        $this->createDate = $createDate;
        $this->servicePrice = $servicePrice;
        $this->tax = $tax;
        $this->totalAmount = $totalAmount;
        $this->due = $due;
        $this->car_parking = $car_parking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Confirmation')->view('Email.booking_confirm')->with( array('name' =>$this->name , 'serviceName' => $this->serviceName, 'eventDate' => $this->eventDate, 'createDate'=> $this->createDate, 'servicePrice' => $this->servicePrice, 'tax' => $this->tax, 'totalAmount' => $this->totalAmount, 'due' => $this->due, 'car_parking' => $this->car_parking));
    }
}
