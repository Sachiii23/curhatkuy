<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RatingModel;
use App\Models\ContactModel;
use App\Models\PaymentModel;

class Admin extends BaseController
{   
    public function index()
    {
        $usermodel = new UserModel();
        $ratingmodel = new RatingModel();
        $contactmodel = new ContactModel();
        $paymentmodel = new PaymentModel();
        

        $data['user'] = $usermodel->findAll();
        $data['rating'] = $ratingmodel->findAll();
        $data['contact'] = $contactmodel->findAll();
        $data['payment'] = $paymentmodel->findAll();
        
        return view('pages/homeAdmin', $data);
    }
}
