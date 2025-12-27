<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalPsikologModel extends Model
{
    protected $table = 'jadwal_psikolog';
    protected $primaryKey = 'id_jadwal';

    protected $allowedFields = [
        'id_psikolog',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

    // 🔹 Ambil semua slot tersedia psikolog
    public function getAvailabilityByPsikolog($id_psikolog)
    {
        return $this->where([
            'id_psikolog' => $id_psikolog,
            'status' => 'tersedia'
        ])->findAll();
    }

    // 🔹 Ambil slot per tanggal
    public function getAvailabilityByDate($id_psikolog, $tanggal)
    {
        return $this->where([
            'id_psikolog' => $id_psikolog,
            'tanggal' => $tanggal,
            'status' => 'tersedia'
        ])->findAll();
    }

    // 🔹 Booking (ANTI DOUBLE BOOKING)
    public function bookSlot($id_jadwal)
    {
        return $this->where([
            'id_jadwal' => $id_jadwal,
            'status' => 'tersedia'
        ])->set(['status' => 'booked'])->update();
    }
}
