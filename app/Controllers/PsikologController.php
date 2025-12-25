<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

    public function schedule($id_psikolog)
{
    $jadwalModel = new JadwalPsikologModel();
    $jadwal = $jadwalModel->getAvailabilityByPsikolog($id_psikolog);

    // Ubah ke format JS-friendly
    $availability = [];

    foreach ($jadwal as $row) {
        $availability[$row['tanggal']][] = substr($row['jam_mulai'], 0, 5);
    }

    return view('scheduleLoggedin', [
        'availabilityData' => json_encode($availability),
        'id_psikolog'       => $id_psikolog
    ]);
}
}