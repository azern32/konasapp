<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Rekening_Hutang extends Model{
    protected $table      = 'akun_hutang';
    protected $primaryKey = 'uuid';



    protected $useAutoIncrement = false;
    protected $allowedFields = ['uuid','kode_akun', 'nama_akun', 'kredit', 'debit'];
}