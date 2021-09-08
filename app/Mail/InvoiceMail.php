<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class InvoiceMail extends Mailable
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

        $data = [
            "donation_id" => $this->db['donation_id'],
            "donor_name" => $this->db['donor_name'],
            "mobile_number" => $this->db['mobile_number'],
            "email_id" => $this->db['email_id'],
            "amount" => $this->db['amount'],
            "currency" => $this->db['currency'],
            "txn_status" => $this->db['txn_status'],
            "txn_date" => $this->db['txn_date'],
            "resp_code" => $this->db['resp_code'],
            "bank_txn_id" => $this->db['bank_txn_id'],
            "txn_id" => $this->db['txn_id'],
            "gateway_name" => $this->db['gateway_name'],
            "bank_name" => $this->db['bank_name'],
            "pg" => $this->db['pg']
        ];

        $filename = $this->db['donation_id']."-Donation-Acknowledgement.pdf";

        $filename2 = $this->db['donation_id']."-Donation-Certificate.pdf";

        $pdf = PDF::loadView('pdfs.invoice', $data);

        $pdf2 = PDF::loadView('pdfs.certificate', $data)->setPaper('a4', 'landscape');

        return $this->subject('Thank You! Donation Acknowledgement')->bcc('postman@garibpathshala.in')->view('emails.InvoiceMail')->attachData($pdf->output(), $filename)->attachData($pdf2->output(), $filename2);

    }
}
