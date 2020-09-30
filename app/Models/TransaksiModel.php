<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';

    public function gettransaksi($id = false)
    {
        if ($id === false) {
            return $this->table('transaksi')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('transaksi')
                ->where('transaksi_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function insert_transaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_transaksi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['transaksi_id' => $id]);
    }

    public function delete_transaksi($id)
    {
        return $this->db->table($this->table)->delete(['transaksi_id' => $id]);
    }

    // public function subtract_qnty($barang_id, $barang_qnty)
    // {
    //     return $this->table('barang')->get()->getRowArray();

    //     $data = [
    //         'barang_qnty' => ('barang_qnty'-$barang_qnty)
    //     ];

    //     $builder->where('barang_id', $barang_id);
    //     $builder->update($data);
    // }

    public function getpelanggan()
    {
        return $this->db->query("select * from pelanggan order by pelanggan_nama asc")->getResultArray();
    }

    public function getbarang()
    {
        return $this->db->query("select * from barang order by barang_nama asc")->getResultArray();
    }

    public function insertTransaksi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function generatetransaksi()
    {
        $sql = "select max(mid(transaksi_id, 9, 4)) as generatetransaksi 
                from transaksi 
                where mid(transaksi_id, 3, 6) = date_format(curdate(), '%y%m%d')";
        $query = $this->db->query($sql);
        if($query->getResultArray() > 0){
            $row = $query->getRowArray();
            $n = ((int)$row['generatetransaksi']) + 1;
            $no = sprintf("%'.04d", $n);
        }else{
            $no = "0001";
        }
        $transaksi_id = "TR".date('ymd').$no;
        return $transaksi_id;
    }

}
