<?php

namespace App\Controllers;

use App\Models\PsikologModel;
use App\Models\JadwalPsikologModel;

class ScheduleController extends BaseController
{
    public function index($id_psikolog)
    {
        $psikologModel = new PsikologModel();
        $jadwalModel   = new JadwalPsikologModel();

        // Ambil data psikolog
        $psikolog = $psikologModel->find($id_psikolog);

        // Ambil jadwal yang tersedia
        $jadwal = $jadwalModel
            ->where('id_psikolog', $id_psikolog)
            ->where('status', 'tersedia')
            ->findAll();

        // Format jadwal agar cocok dengan JS
        $availability = [];

        foreach ($jadwal as $j) {
            $availability[$j['tanggal']][] = substr($j['jam'], 0, 5);
        }

        return view('scheduleLoggedin', [
            'selected_psikolog' => $psikolog,
            'availabilityData'  => json_encode($availability)
        ]);
    }
}
