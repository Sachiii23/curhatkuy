<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('pages/login', $data);
    }
    
    public function save()
    {
        helper(['form']);
        $rules = [
            'nama_lengkap'          => 'required|min_length[3]|max_length[30]',
            'email'                 => 'required|min_length[3]|max_length[30]',
            'password'              => 'required|min_length[3]|max_length[30]',
            'j_kelamin'             => 'required|min_length[3]|max_length[30]',
            'alamat'                => 'required|min_length[3]|max_length[90]',
            'tgl_lahir'             => 'required|min_length[3]|max_length[12]',
            'tlp'                   => 'required|min_length[3]|max_length[30]'
        ];
        
        $session = session();
        
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'nama_lengkap'     => $this->request->getVar('nama_lengkap'),
                'email'            => $this->request->getVar('email'),
                'password'         => $this->request->getVar('password'),
                'j_kelamin'        => $this->request->getVar('j_kelamin'),
                'alamat'           => $this->request->getVar('alamat'),
                'tgl_lahir'        => $this->request->getVar('tgl_lahir'),
                'tlp'              => $this->request->getVar('tlp')
            ];
            $model->save($data);
            $session->setFlashdata('msg', 'Selamat akun anda berhasil terdaftar');
            return redirect()->to(base_url('home/login'));
        } else{
            $data['validation'] = $this->validator;
            $session->setFlashdata('msg', 'Pembuatan akun gagal, Pastikan anda mengisi formulir dengan data yang valid!');
        }
    } 
}
?>