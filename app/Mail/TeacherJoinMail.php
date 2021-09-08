<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeacherJoinMail extends Mailable
{
    use Queueable, SerializesModels;

    public $db;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('We recived your Application - Garib Pathshala')->bcc('join@garibpathshala.in')->view('emails.TeacherApplication');
    }
}
