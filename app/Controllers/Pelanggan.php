<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PelangganModel;

class Pelanggan extends Controller
{

    public function __construct()
    {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->pelanggan = new PelangganModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index()
    {
        if(session()->get('pelanggan_nama')==''){
            session()->setFlashdata('gagal', 'Anda belum login!!!');
            return redirect()->to(base_url('login'));
        }
         
        $data['pelanggan'] = $this->pelanggan->getpelanggan();
        echo view('pelanggan/index', $data);
    }
    public function create()
    {
        return view('pelanggan/create');
    }

    public function store()
    {
        $id = $this->request->getPost('pelanggan_id');
        $nama = $this->request->getPost('pelanggan_nama');
        $tgllahir = $this->request->getPost('pelanggan_tgllahir');
        $jk = $this->request->getPost('pelanggan_jk');
        $email = $this->request->getPost('pelanggan_email');
        $phone = $this->request->getPost('pelanggan_phone');
        $password = $this->request->getPost('pelanggan_password');
        $alamat = $this->request->getPost('pelanggan_alamat');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'pelanggan_id' => $id,
            'pelanggan_nama' => $nama,
            'pelanggan_tgllahir' => $tgllahir,
            'pelanggan_jk' => $jk,
            'pelanggan_email' => $email,
            'pelanggan_phone' => $phone,
            'pelanggan_password' => $password,
            'pelanggan_alamat' => $alamat
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan = $this->pelanggan->insert_pelanggan($data);

        // Jika simpan berhasil, maka ...
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created pelanggan successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('pelanggan'));
        }
    }
    public function edit($id)
    {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['pelanggan'] = $this->pelanggan->getpelanggan($id);
        // Mengirim data ke dalam view
        return view('pelanggan/edit', $data);
    }

    public function update()
    {
        // Mengambil value dari form dengan method POST
        $id = $this->request->getPost('pelanggan_id');
        $nama = $this->request->getPost('pelanggan_nama');
        $tgllahir = $this->request->getPost('pelanggan_tgllahir');
        $jk = $this->request->getPost('pelanggan_jk');
        $email = $this->request->getPost('pelanggan_email');
        $phone = $this->request->getPost('pelanggan_phone');
        $password = $this->request->getPost('pelanggan_password');
        $alamat = $this->request->getPost('pelanggan_alamat');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'pelanggan_id' => $id,
            'pelanggan_nama' => $nama,
            'pelanggan_tgllahir' => $tgllahir,
            'pelanggan_jk' => $jk,
            'pelanggan_email' => $email,
            'pelanggan_phone' => $phone,
            'pelanggan_password' => $password,
            'pelanggan_alamat' => $alamat
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah = $this->pelanggan->update_pelanggan($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated pelanggan successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('pelanggan'));
        }
    }
    public function delete($id)
    {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus

        $hapus = $this->pelanggan->delete_pelanggan($id);
        // $hapus = $this->pelanggan->where('pelanggan_id', $id)->delete();

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted pelanggan successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('pelanggan'));
        }
    }
}
