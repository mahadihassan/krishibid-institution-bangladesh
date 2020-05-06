<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $pass)
    {
        $this->user = $user;
        $this->pass = $pass;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //dd($this->pass);
        return $this->subject('User Account Approved')->view('Email.UserMail')->with(array('data' =>$this->user, 'data2' => $this->pass));
    }
}
