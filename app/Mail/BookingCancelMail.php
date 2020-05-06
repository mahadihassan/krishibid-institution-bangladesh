<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookingCancelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $servicename, $eventDate, $due, $userName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($servicename, $eventDate, $due, $userName)
    {
        $this->servicename = $servicename;
        $this->eventDate = $eventDate;
        $this->due = $due;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Cancel')->view('Email.bookingCancel')->with(array('servicename' => $this->servicename , ' eventDate' => $this->eventDate, 'due' => $this->due, 'userName' => $this->userName));
    }
}
