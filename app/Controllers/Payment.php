<?php 

namespace App\Controllers;

use App\Models\PaymentModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Payment extends Controller
{
    public function index(){
        return view('pages/payment');
    }

    public function createPayment(){
        $session = session();
        $paymentModel = new PaymentModel();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $nama_lengkap = $this->request->getVar('nama_lengkap');
        $user = $userModel->where('email', $email)->first();
        $package = $this->request->getPost('package');
        $amount = 0;
        $transaction_status = 'pending';
        
        if ($package == 'Sesi Curhat'){
            $amount = 50000;
        } elseif ($package == 'Couple Curhat'){
            $amount = 100000;
        } elseif ($package == 'Paket Plong'){
            $amount = 150000;
        }
        
        if($user){
            $nama = $user['nama_lengkap'];
            if($nama_lengkap == $nama){
                $data = [
                    'order_id' => uniqid(),
                    'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                    'email' => $this->request->getPost('email'),
                    'package' => $package,
                    'amount' => $amount,
                    'payment_type' => $this->request->getPost('payment_type'),
                    'transaction_status' => $transaction_status
                    // 'imgpayment' => $this->request->getFile('imgpayment')
                ];
        
                $paymentModel->save($data);
                return redirect()->to(base_url('consult/index'));
            }
            else{
                $session->setFlashdata('msg', 'Nama yang anda masukan tidak sesuai dengan email anda!');
                return redirect()->to(base_url('payment/index'));
            }
        }
        else{
            $session->setFlashdata('msg', 'Email yang anda masukan tidak terdaftar');
            return redirect()->to(base_url('payment/index'));
        }
    }
}