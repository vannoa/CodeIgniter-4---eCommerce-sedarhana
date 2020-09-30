<?php

namespace App\Controllers;

use App\Models\Dashboard_model;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->dashboard_model = new Dashboard_model();
    }

    public function index()
    {
        if(session()->get('pelanggan_nama')==''){
           session()->setFlashdata('gagal', 'Anda belum login!!!');
           return redirect()->to(base_url('login'));
        }

        $data['total_transaksi']  = $this->dashboard_model->getCountTransaksi();
        $data['total_barang']      = $this->dashboard_model->getCountBarang();
        $data['total_pelanggan']     = $this->dashboard_model->getCountPelanggan();
        $data['latest_transaksi']         = $this->dashboard_model->getLatestTransaksi();

        $chart['grafik']            = $this->dashboard_model->getGrafik();

        echo view('dashboard', $data);
        echo view('layouts/footer', $chart);
    }
}
