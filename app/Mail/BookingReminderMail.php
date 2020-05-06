<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $servicename, $eventDate, $due, $userName, $servicecost, $carParking, $tax, $createDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servicename, $servicecost, $eventDate, $due, $userName, $carParking, $tax, $createDate)
    {
        $this->servicename = $servicename;
        $this->eventDate = $eventDate;
        $this->due = $due;
        $this->userName = $userName;
        $this->servicecost = $servicecost;
        $this->carParking = $carParking;
        $this->tax = $tax;
        $this->createDate = $createDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Reminder')->view('Email.booking_reminder')->with(array('servicename' => $this->servicename , 'eventDate' => $this->eventDate, 'due' => $this->due, 'userName' => $this->userName, 'servicecost' => $this->servicecost, 'carParking' => $this->carParking, 'tax' => $this->tax, 'createDate' => $this->createDate));
    }
}
