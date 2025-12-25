<?php

namespace App\Controllers;

class Index3 extends BaseController
{
    public function index()
    {
        echo view('pages/index3');
    }
    public function about()
    {
        echo view('pages/about1');
    }
    public function payment()
    {
        echo view('pages/payment');
    }
       public function psikolog()
    {
        echo view('pages/psikologLoggedin');
    }

     public function paket($type)
    {
        return view('pages/paketPages/' . $type);
    }

    public function profilPsikolog($id)
    {
        return view('pages/profilPsikologPagesLoggedin/profilPsikolog' . $id);
    }

// public function profilPsikolog($id)
// {
//     $isLoggedIn = session()->get('isLoggedIn'); // atau sesuai auth kamu

//     if ($isLoggedIn) {
//         return view('pages/profilPsikologPagesLoggedin/profilPsikolog' . $id);
//     }

//     return view('pages/profilPsikologPages/profilPsikolog' . $id);
// }

    
        public function schedule()
    {
        // 1. Ambil ID dari URL Query Parameter (?psikolog_id=X)
        // Jika tidak ada ID, akan mengembalikan NULL
        $psikolog_id = $this->request->getVar('psikolog_id');
        
        // 2. Data Psikolog Statis (HARUS disinkronkan dengan ID di halaman psikolog.php)
        // DI MASA DEPAN, BAGIAN INI HARUS DIGANTI DENGAN PEMBACAAN DARI DATABASE/MODEL
        $psikolog_data = [
            '1' => ['nama' => 'Syachra Shafa Kamila', 'spesialisasi' => 'Psikolog Klinis', 'harga' => 'Rp. 400.000'],
            '2' => ['nama' => 'Sufyaan Gymnastiar', 'spesialisasi' => 'Psikolog Klinis', 'harga' => 'Rp. 280.000'],
            '3' => ['nama' => 'Adelilya Salsabila Sujatmoko', 'spesialisasi' => 'Psikolog Klinis', 'harga' => 'Rp. 280.000'],
            '4' => ['nama' => 'Manda Aulia', 'spesialisasi' => 'Psikolog Klinis', 'harga' => 'Rp. 400.000'],
            '5' => ['nama' => 'Adinda Deswita', 'spesialisasi' => 'Psikolog Klinis', 'harga' => 'Rp. 400.000'],
            '6' => ['nama' => 'Yulia Direzkia, M.Si.', 'spesialisasi' => 'Psikolog Klinis, EMDR Asia Accredited Trainer & Consultant (Psychotrauma Specialist)', 'harga' => 'Rp. 580.000'],
        ];

        // 3. Tentukan psikolog yang dipilih
        // Jika ID tidak ditemukan, berikan data 'Psikolog Tidak Ditemukan'
        $default_data = ['nama' => 'Psikolog Tidak Ditemukan', 'spesialisasi' => 'N/A', 'harga' => 'N/A'];
        $selected_psikolog = $psikolog_data[$psikolog_id] ?? $default_data;
        
        // 4. Siapkan data untuk dikirim ke View
        $data = [
            'selected_psikolog' => $selected_psikolog,
            'psikolog_id' => $psikolog_id // Mengirim ID juga (berguna untuk langkah booking)
        ];
        
        // 5. Load View dan kirim data
        // Pastikan file view Anda berada di 'app/Views/pages/schedule.php'
        return view('pages/scheduleLoggedin', $data);
    }
}