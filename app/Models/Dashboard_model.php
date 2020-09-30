<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_model extends Model
{
    protected $table = 'transaksi';

    // hitung total data pada transaction
    public function getCountTransaksi()
    {
        return $this->db->table("transaksi")->countAll();
    }

    // hitung total data pada category
    public function getCountBarang()
    {
        return $this->db->table("barang")->countAll();
    }

    // hitung total data pada product
    public function getCountPelanggan()
    {
        return $this->db->table("pelanggan")->countAll();
    }

    public function getGrafik()
    {
        $query = $this->db->query("SELECT transaksi_harga, MONTHNAME(transaksi_date) as month, COUNT(transaksi_bid) as total FROM transaksi GROUP BY MONTHNAME(transaksi_date) ORDER BY MONTH(transaksi_date)");
        if (!empty($query)) {
            foreach ($query->getResultArray() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function getLatestTransaksi()
    {
        return $this->table('transaksi')
            ->select('barang.barang_nama, transaksi.*')
            ->join('barang', 'barang.barang_id = transaksi.transaksi_bid')
            ->orderBy('transaksi.transaksi_id', 'desc')
            ->limit(5)
            ->get()
            ->getResultArray();
    }
    
}