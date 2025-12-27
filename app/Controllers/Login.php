<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AdminModel;

class Login extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('pages/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $modelAdmin = new AdminModel();
        $modelpsikolog = new PsikologModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        $admin = $modelAdmin->where('email', $email)->first();
        $psikolog = $modelpsikolog->where('email', $email)->first();
        if($admin){
            $pass = $admin['password'];
            if($password == $pass){
                $ses_data = [
                    'nama_lengkap'      => $admin['nama_lengkap'],
                    'email'             => $admin['email'],
                    'logged_in'         => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('admin/index'));
            }
            elseif($psikolog){
                $pass == $psikolog['password'];
                if($password == $pass){
                    $ses_data = [
                        'nama_lengkap'      => $psikolog['nama'],
                        'email'             => $psikolog['email'],
                        'logged_in'         => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to(base_url('psikolog/index'));
                };   
            }
            else{
                $session->setFlashdata('msg', 'Password yang anda masukan salah');
                return redirect()->to(base_url('home/login'));
            }
        }
        if($data){
            $pass = $data['password'];
            if($password == $pass){
                $ses_data = [
                    'nama_lengkap'      => $data['nama_lengkap'],
                    'email'             => $data['email'],
                    'logged_in'         => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('index3/index'));
            }else{
                $session->setFlashdata('msg', 'Password yang anda masukan salah');
                return redirect()->to(base_url('home/login'));
            }
        }else{
            $session->setFlashdata('msg', 'Email yang anda masukan tidak valid');
            return redirect()->to(base_url('home/login'));
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }
}
?>