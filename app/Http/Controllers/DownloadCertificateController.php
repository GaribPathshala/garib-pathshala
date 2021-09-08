<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use PDF;

class DownloadCertificateController extends Controller
{
    public function CertificateDownload($id, $key, Request $req)
    {

        $data = Donation::where(['donation_id' => $id , 'download_key' => $key , 'txn_status' => 'TXN_SUCCESS'])->first();

        if (isset($data)) {
            $pdf = PDF::loadView('pdfs.certificate', ['db' => $data])->setPaper('a4', 'landscape');
            return $pdf->download($id."-Donation-Certificate.pdf");
        } else {
            return view('errors.419');
        }

    }
}
