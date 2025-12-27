<?php
namespace App\Models;
use CodeIgniter\Model;

class JadwalPsikologModel extends Model
{
    protected $table = 'jadwal_psikolog';
    protected $allowedFields = ['id_psikolog', 'tanggal', 'jam_mulai', 'jam_selesai','status'];

    public function getAvailableByDate($id_psikolog, $tanggal)
    {
        return $this->where([
            'psikolog_id' => $id_psikolog,
            'tanggal'     => $tanggal,
            'status'      => 'tersedia'
        ])->orderBy('jam_mulai', 'ASC')
          ->findAll();
    }

    // 🔹 Booking (ANTI DOUBLE BOOKING)
    public function bookSlot($id_jadwal)
    {
        return $this->where([
            'psikolog_id' => $id_psikolog,
            'tanggal'     => $tanggal,
            'jam_mulai'   => $jam_mulai,
            'status'      => 'tersedia'
        ])->set(['status' => 'booked'])
          ->update();
    }
}
