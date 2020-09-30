<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';

    public function getbarang($id = false)
    {
        if ($id === false) {
            return $this->table('barang')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('barang')
                ->where('barang_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function insert_barang($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_barang($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['barang_id' => $id]);
    }

    public function delete_barang($id)
    {
        return $this->db->table($this->table)->delete(['barang_id' => $id]);
    }

    public function subtract_qnty($barang_id, $barang_qnty)
    {
        $builder = $this->db->table('barang');

        $builder->select('barang_qnty');
        $builder->where('barang_id', $barang_id);

        $query = $builder->get()->getRowArray();

        $data = [
            'barang_qnty' => $query['barang_qnty'] - $barang_qnty
        ];

        $builder->where('barang_id', $barang_id);
        return $builder->update($data);
    }

    public function getPrice($id)
    {
        return $this->db->table($this->table)->getWhere(['barang_id' => $id])->getRowArray();
    }
}
