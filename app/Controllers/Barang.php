<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\barangModel;

class Barang extends Controller {

    public function __construct() {

        // Mendeklarasikan class ProductModel menggunakan $this->product
        $this->barang=new BarangModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
    }

    public function index() {
        if(session()->get('pelanggan_nama')==''){
            session()->setFlashdata('gagal', 'Anda belum login!!!');
            return redirect()->to(base_url('login'));
        }

        $data['barang']=$this->barang->getbarang();
        echo view('barang/index', $data);
    }

    public function create() {
        return view('barang/create');
    }

    public function store() {
        $id=$this->request->getPost('barang_id');
        $nama=$this->request->getPost('barang_nama');
        $harga=$this->request->getPost('barang_harga');
        $qnty=$this->request->getPost('barang_qnty');
        $kategori=$this->request->getPost('barang_kategori');
        $inpdate=$this->request->getPost('barang_inpdate');
        $expdate=$this->request->getPost('barang_expdate');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data=[ 'barang_id'=>$id,
        'barang_nama'=>$nama,
        'barang_harga'=>$harga,
        'barang_qnty'=>$qnty,
        'barang_kategori'=>$kategori,
        'barang_inpdate'=>$inpdate,
        'barang_expdate'=>$expdate,
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_product dan membawa parameter data 
        */
        $simpan=$this->barang->insert_barang($data);

        // Jika simpan berhasil, maka ...
        if ($simpan) {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created profil successfully');
            // Redirect halaman ke product
            return redirect()->to(base_url('barang'));
        }
    }

    public function edit($id) {
        // Memanggil function getProduct($id) dengan parameter $id di dalam ProductModel dan menampungnya di variabel array product
        $data['barang']=$this->barang->getbarang($id);
        // Mengirim data ke dalam view
        return view('barang/edit', $data);
    }

    public function update() {
        // Mengambil value dari form dengan method POST
        $id=$this->request->getPost('barang_id');
        $nama=$this->request->getPost('barang_nama');
        $harga=$this->request->getPost('barang_harga');
        $qnty=$this->request->getPost('barang_qnty');
        $kategori=$this->request->getPost('barang_kategori');
        $inpdate=$this->request->getPost('barang_inpdate');
        $expdate=$this->request->getPost('barang_expdate');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data=[ 'barang_id'=>$id,
        'barang_nama'=>$nama,
        'barang_harga'=>$harga,
        'barang_qnty'=>$qnty,
        'barang_kategori'=>$kategori,
        'barang_inpdate'=>$inpdate,
        'barang_expdate'=>$expdate,
        ];

        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_product dan membawa parameter data beserta id
        */
        $ubah=$this->barang->update_barang($data, $id);

        // Jika berhasil melakukan ubah
        if ($ubah) {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated barang successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('barang'));
        }
    }

    public function delete($id) {
        // Memanggil function delete_product() dengan parameter $id di dalam ProductModel dan menampungnya di variabel hapus
        $hapus=$this->barang->delete_barang($id);

        // Jika berhasil melakukan hapus
        if ($hapus) {
            // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted barang successfully');
            // Redirect ke halaman product
            return redirect()->to(base_url('barang'));
        }
    }

}