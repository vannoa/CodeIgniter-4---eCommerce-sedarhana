<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'pelanggan';

    public function cekLogin($pelanggan_id, $pelanggan_password)
    {
       
        return $this->table('pelanggan')
            ->where(array('pelanggan_id' => $pelanggan_id, 'pelanggan_password' => $pelanggan_password))
            ->get()->getRowArray();
        
    }
}