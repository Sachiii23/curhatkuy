<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payment';
    protected $allowedFields = [
        'order_id', 'nama_lengkap', 'email','package', 'amount', 'payment_type'
    ];
}
