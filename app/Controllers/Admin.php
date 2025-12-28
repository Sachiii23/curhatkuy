<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\models\PsikologModel;
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
        $psikologmodel = new PsikologModel();

        // Data untuk Dashboard
        $data['user'] = $usermodel->findAll();
        $data['rating'] = $ratingmodel->findAll();
        $data['contact'] = $contactmodel->findAll();
        
        // SINKRONISASI: Mengambil data user yang HANYA memiliki role psikolog
        $data['list_psikolog'] = $psikologmodel->where('role', 'psikolog')->findAll();

        // Mengambil data payment terbaru
        $data['payment'] = $paymentmodel->orderBy('payment_date', 'DESC')->findAll();

        return view('pages/homeAdmin', $data);
    }

    /**
     * Menyimpan data psikolog baru
     */
    public function save_psikolog()
    {
        $psikologmodel = new PsikologModel();

        // 1. Ambil file foto
        // $fileFoto = $this->request->getFile('foto');
        // if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
        //     $namaFoto = $fileFoto->getRandomName();
        //     $fileFoto->move(FCPATH . 'img', $namaFoto); 
        // } else {
        //     $namaFoto = null; 
        // }

        // 2. Olah data layanan (Checkbox array ke String)
        $layananArray = $this->request->getPost('spesialisasi');
        $layananString = !empty($layananArray) ? implode(', ', $layananArray) : 'Belum diatur';

        // 3. Siapkan data dengan field baru (Title & Harga)
        $data = [
            'nama' => $this->request->getPost('nama'),
            'harga'        => $this->request->getPost('harga'), 
            'email'        => $this->request->getPost('email'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'psikolog',
            'spesialisasi' => $layananString
        ];

        if ($usermodel->insert($data)) {
            return redirect()->to(base_url('admin'))->with('message', 'Psikolog berhasil ditambahkan!');
        } else {
            return redirect()->to(base_url('admin'))->with('error', 'Gagal menyimpan ke database.');
        }
    }

    /**
     * Update data psikolog
     */
    public function update_psikolog()
    {
        $psikologmodel = new PsikologModel();
        $email = $this->request->getPost('email_lama');

        // 1. Olah data layanan
        $layananArray = $this->request->getPost('spesialisasi');
        $layananString = !empty($layananArray) ? implode(', ', $layananArray) : 'Belum diatur';
        
        // 2. Siapkan data update termasuk Title & Harga
        $data = [
            'nama'         => $this->request->getPost('nama'),
            'harga'        => $this->request->getPost('harga'), // Field Baru
            'spesialisasi' => $layananString 
        ];

        // 3. Logika upload foto jika ada file baru
        // $fileFoto = $this->request->getFile('foto');
        // if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
        //     $namaFoto = $fileFoto->getRandomName();
        //     $fileFoto->move(FCPATH . 'img', $namaFoto);
        //     $data['foto'] = $namaFoto;
        // }

        if ($usermodel->update($email, $data)) {
            return redirect()->to(base_url('admin'))->with('message', 'Data psikolog berhasil diperbarui!');
        }
        return redirect()->to(base_url('admin'))->with('error', 'Gagal memperbarui data.');
    }

    /**
     * Menghapus Psikolog
     */
    public function delete_psikolog($email)
    {
        $usermodel = new UserModel();
        
        if ($usermodel->delete($email)) {
            return redirect()->to(base_url('admin'))->with('message', 'Akun Psikolog berhasil dihapus.');
        }
        return redirect()->to(base_url('admin'))->with('error', 'Gagal menghapus data.');
    }

    /**
     * Update Status Pembayaran (Approval)
     */
    public function update_status($order_id, $status)
    {
        $paymentmodel = new PaymentModel();
        $allowed_status = ['success', 'canceled'];

        if (in_array($status, $allowed_status)) {
            $updated = $paymentmodel->update($order_id, [
                'transaction_status' => $status
            ]);

            if ($updated) {
                $statusMsg = ($status == 'success') ? 'disetujui (Approved)' : 'dibatalkan (Canceled)';
                return redirect()->to(base_url('admin'))->with('message', 'Pesanan ' . $order_id . ' berhasil ' . $statusMsg);
            }
        }

        return redirect()->to(base_url('admin'))->with('error', 'Gagal memperbarui status.');
    }
}