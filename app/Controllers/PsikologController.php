<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JadwalPsikologModel;
use App\Models\PsikologModel;


class PsikologController extends BaseController
{
    protected $psikologModel;

    public function __construct()
    {
        $this->psikologModel = new PsikologModel();
    }

    public function coupleCurhat()
    {
        // Proteksi login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil data psikolog berdasarkan spesialisasi
        $data['psikolog'] = $this->psikologModel
            ->where('spesialisasi', 'Couple Curhat')
            ->findAll();

        return view('pages/paketPages/coupleCurhat', $data);
    }

    public function kuyCurhat()
    {
        // Proteksi login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil data psikolog berdasarkan spesialisasi
        $data['psikolog'] = $this->psikologModel
            ->findAll();

        return view('pages/paketPages/kuyCurhat', $data);
    }

    public function paketCurhat()
    {
        // Proteksi login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Ambil data psikolog berdasarkan spesialisasi
        $data['psikolog'] = $this->psikologModel
            ->where('spesialisasi', 'Paket Curhat')
            ->findAll();

        return view('pages/paketPages/paketCurhat', $data);
    }

    public function schedule()
{
    $tanggal = date('Y-m-d'); // default hari ini
    $psikologModel = new PsikologModel();
    $jadwalModel = new JadwalPsikologModel();
    $jadwal = $jadwalModel->getAvailabilityByDate($tanggal);

    // sementara hardcode psikolog_id = 1
    $psikolog = $psikologModel->find(1);

    $harga = $psikolog['harga'] ?? 0;

    // ubah ke format JS
    $availabilityData = json_encode($jadwal);

    return view('pages/scheduleLoggedin', [
        'harga' => $harga,
        'availabilityData' => $availabilityData
    ]);
}
}