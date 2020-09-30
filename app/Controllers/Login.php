<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends Controller
{

    public function __construct()
    {
        helper('form');
        $this->login = new LoginModel();
        // Mendeklarasikan class ProductModel menggunakan $this->product
        //$this->login = new LoginModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        echo view('login/login');
    }

    public function cek_login(){
        $pelanggan_id = $this->request->getPost('pelanggan_id');
        $pelanggan_password = $this->request->getPost('pelanggan_password');

        $cek = $this->login->cekLogin($pelanggan_id, $pelanggan_password);

        if(($cek['pelanggan_id']==$pelanggan_id) && ($cek['pelanggan_password']==$pelanggan_password) && ($cek['pelanggan_level']==1)){
            session()->set('pelanggan_id', $cek['pelanggan_id']);
            session()->set('pelanggan_nama', $cek['pelanggan_nama']);
            session()->set('pelanggan_level', $cek['pelanggan_level']);
            return redirect()->to(base_url('Dashboard'));
        }else if(($cek['pelanggan_id']==$pelanggan_id) && ($cek['pelanggan_password']==$pelanggan_password) && ($cek['pelanggan_level']==2)){
            session()->set('pelanggan_id', $cek['pelanggan_id']);
            session()->set('pelanggan_nama', $cek['pelanggan_nama']);
            session()->set('pelanggan_level', $cek['pelanggan_level']);
            return redirect()->to(base_url('Transaksi'));
        }else{
            session()->setFlashdata('gagal', 'username atau password salah!!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

}

?>