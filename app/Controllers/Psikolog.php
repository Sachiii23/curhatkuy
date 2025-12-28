<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PsikologModel;
use App\Models\PaymentModel;

class Psikolog extends BaseController
{
    public function index()
    {
        // Ambil nama dari session login
        $namaPsikolog = session()->get('nama'); 

        // if (!$namaPsikolog) {
        //     return redirect()->to(base_url('home/login'));
        // }

        $paymentModel = new PaymentModel();

        // Cari pasien berdasarkan nama psikolog yang login ("Syachra")
        $data['pasien'] = $paymentModel->where('psikolog', $namaPsikolog)
                                       ->whereIn('transaction_status', ['success', 'approved'])
                                       ->orderBy('payment_date', 'DESC')
                                       ->findAll();

        // PERBAIKAN PATH: Sesuai Screenshot Explorer, file ada di folder 'pages'
        return view('pages/dashboardpsikolog', $data);
    }
}
