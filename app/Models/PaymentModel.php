<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'payment';
    protected $primaryKey = 'order_id';
    
    // Karena kita menggunakan string 'INV-XXXX', auto increment harus false
    protected $useAutoIncrement = false; 
    
    // Field yang diizinkan untuk diisi (Insert/Update)
    // Disesuaikan dengan struktur Screenshot 17.10.58 + Kolom bukti_bayar
    protected $allowedFields = [
        'order_id', 
        'nama_lengkap', 
        'email', 
        'package', 
        'psikolog', 
        'tgl_konsultasi', 
        'jam_konsultasi', 
        'amount', 
        'payment_type', 
        'transaction_status', 
        'payment_date',
        'bukti_bayar' // Pastikan sudah kamu tambah via SQL: ALTER TABLE payment ADD bukti_bayar VARCHAR(255)
    ];

    // Menambahkan return type agar hasil query otomatis menjadi array
    protected $returnType = 'array';
}
