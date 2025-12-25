<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RatingModel;

class Rating extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('pages/rating', $data);
    }
    
    public function send()
    {
        helper(['form']);
        $rules = [
            'name'                  => 'required|min_length[3]|max_length[30]',
            'email'                 => 'required|min_length[3]|max_length[30]',
            'rate'                  => 'required|min_length[1]|max_length[1]',
            'message'               => 'required|min_length[3]|max_length[150]'
        ];

        $session = session();
        
        if($this->validate($rules)){
            $model = new RatingModel();
            $data = [
                'name'             => $this->request->getVar('name'),
                'email'            => $this->request->getVar('email'),
                'rate'              => $this->request->getVar('rate'),
                'message'          => $this->request->getVar('message')
            ];
            $model->save($data);
            $session->setFlashdata('msg', 'Selamat masukan anda telah terkirim');
            return redirect()->to(base_url('index3/index'));
        } else{
            $data['validation'] = $this->validator;
            $session->setFlashdata('msg', 'Pesan yang anda masukan tidak valid, Pastikan anda mengisi formulir dengan data yang valid!');
        }
    } 
}
?>