<?php

namespace App\Controllers;

class Consult extends BaseController
{
    public function index()
    {
        echo view('pages/consult');
    }
    public function finish()
    {
        echo view('pages/rating');
    }
        public function history()
    {
        echo view('pages/history');
    }
}
