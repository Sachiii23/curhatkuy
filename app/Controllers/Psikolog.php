<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\PsikologModel;

class Psikolog extends BaseController
{   
    public function index()
    {
        $psikologmodel = new PsikologModel();
        $jadwalmodel = new JadwalPsikologModel();
        

        $data['psikolog'] = $psikologmodel->findAll();
        $data[''] = $ratingmodel->findAll();
        $data['contact'] = $contactmodel->findAll();
        $data['payment'] = $paymentmodel->findAll();
        
        return view('pages/homeAdmin', $data);
    }
}
