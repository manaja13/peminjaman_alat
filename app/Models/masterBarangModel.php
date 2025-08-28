<?php

namespace App\Models;

use CodeIgniter\Model;


class masterBarangModel extends Model
{
    protected $table = 'master_barang';
    protected $primaryKey = 'kode_brg';
    protected $allowedFields = ['kode_brg', 'nama_brg', 'jenis_brg', 'merk', 'created_at', 'updated_at'];

    public function getMasterInventory($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return
                $this->where('kode_brg', $id)->first();
        }
    }

    public function getMasterAtk($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kode_brg' => $id]);
        }
    }
}