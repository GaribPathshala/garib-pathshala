<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationHistoryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $DonationHistory;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($DonationHistory)
    {
        $this->DonationHistory = $DonationHistory;
  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Donation History - Garib Pathshala')->bcc('tech.garibpathshala@gmail.com')->view('emails.DonationHistory');
    }
}
