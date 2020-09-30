<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProfilModel;

class Register extends Controller
{

    public function __construct()
    {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->profil = new ProfilModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        echo view('Register/register');
    }
    public function create()
    {
        return view('Register/register');
    }

    public function store()
    {
        $id = $this->request->getPost('id_profil');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        $level = $this->request->getPost('level');
        $tgl = $this->request->getPost('tgl_lhr');
        $tmp = $this->request->getPost('tmp_lhr');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'id_profil' => $id,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'password' => $password,
            'level' => $level,
            'tgl_lhr' => $tgl,
            'tmp_lhr' => $tmp
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->profil->insert_profil($data);

        // Jika simpan berhasil, maka ...
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created profil successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('Pinjaman'));
        }
    }
    // public function edit($id)
    // {
    //     // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
    //     $data['profil'] = $this->profil->getprofil($id);
    //     // Mengirim data ke dalam view
    //     return view('Profil/edit', $data);
    // }

    // public function update()
    // {
    //     // Mengambil value dari form dengan method POST
    //     $id = $this->request->getPost('id_profil');
    //     $nama = $this->request->getPost('nama');
    //     $alamat = $this->request->getPost('alamat');
    //     $tgl = $this->request->getPost('tgl_lhr');
    //     $tmp = $this->request->getPost('tmp_lhr');

    //     // Membuat array collection yang disiapkan untuk insert ke table
    //     $data = [
    //         'id_profil' => $id,
    //         'nama' => $nama,
    //         'alamat' => $alamat,
    //         'tgl_lhr' => $tgl,
    //         'tmp_lhr' => $tmp
    //     ];

    //     /* 
    //     Membuat variabel ubah yang isinya merupakan memanggil function 
    //     update_product dan membawa parameter data beserta id
    //     */
    //     $ubah = $this->profil->update_profil($data, $id);

    //     // Jika berhasil melakukan ubah
    //     if ($ubah) {
    //         // Deklarasikan session flashdata dengan tipe info
    //         session()->setFlashdata('info', 'Updated profil successfully');
    //         // Redirect ke halaman product
    //         return redirect()->to(base_url('Profil'));
    //     }
    // }
    // public function delete($id)
    // {
    //     // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
    //     $hapus = $this->profil->delete_profil($id);

    //     // Jika berhasil melakukan hapus
    //     if ($hapus) {
    //         // Deklarasikan session flashdata dengan tipe warning
    //         session()->setFlashdata('warning', 'Deleted profil successfully');
    //         // Redirect ke halaman product
    //         return redirect()->to(base_url('Profil'));
    //     }
    // }
}
