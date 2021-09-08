<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use PDF;

class DownloadReceiptController extends Controller
{
    public function ReceiptDownload($id, $key, Request $req)
    {
        $data = Donation::where(['donation_id' => $id , 'download_key' => $key , 'txn_status' => 'TXN_SUCCESS'])->first();

        if (isset($data)) {
            $pdf = PDF::loadView('pdfs.invoice', ['db' => $data]);
            return $pdf->download($id."-Donation-Acnknowledgement.pdf");
        } else {
            return view('errors.419');
        }

    }
}
