<?php

namespace App\Models;

use CodeIgniter\Model;

class PsikologModel extends Model
{
    protected $table            = 'psikolog';
    protected $primaryKey       = 'id_psikolog';

    protected $allowedFields    = [
        'nama',
        'spesialisasi',
        'harga',
        'role'
    ];
}
