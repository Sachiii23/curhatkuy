<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactModel;

class Contact extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('pages/contact', $data);
    }
    
    public function send()
    {
        helper(['form']);
        $rules = [
            'name'                  => 'required|min_length[3]|max_length[30]',
            'phone'                 => 'required|min_length[3]|max_length[30]',
            'email'                 => 'required|min_length[3]|max_length[30]',
            'message'               => 'required|min_length[3]|max_length[150]'
        ];

        $session = session();
        
        if($this->validate($rules)){
            $model = new ContactModel();
            $data = [
                'name'             => $this->request->getVar('name'),
                'phone'            => $this->request->getVar('phone'),
                'email'            => $this->request->getVar('email'),
                'message'          => $this->request->getVar('message')
            ];
            $model->save($data);
            $session->setFlashdata('msg', 'Selamat masukan anda telah terkirim');
            return redirect()->to(base_url('home/login'));
        } else{
            $data['validation'] = $this->validator;
            $session->setFlashdata('msg', 'Pesan yang anda masukan tidak valid, Pastikan anda mengisi formulir dengan data yang valid!');
        }
    } 
}
?>