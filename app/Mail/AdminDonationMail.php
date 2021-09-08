<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminDonationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $req;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($req)
    {
        $this->req = $req;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Message from Team Garib Pathshala')->bcc('postman@garibpathshala.in')->view('emails.AdminDonationMail');
    }
}
