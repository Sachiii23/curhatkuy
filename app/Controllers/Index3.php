<?php

namespace App\Controllers;

use App\Models\PsikologModel;

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
        $psikologModel = new PsikologModel();
        $data['psikolog'] = $psikologModel
        ->select('id_psikolog, nama, harga')
        ->findAll();
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
        $psikolog = $this->request->getVar('psikolog');
        $harga = $this->request->getVar('harga');
        $layanan = $this->request->getVar('layanan');

        $data = [
            'psikolog' => $psikolog,
            'harga'    => $harga,
            'layanan'  => $layanan
        ];

        return view('pages/scheduleLoggedin', $data); 
    }
}