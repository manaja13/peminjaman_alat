<?php
namespace App\Models;

use CodeIgniter\Model;

class masterBarangModel extends Model
{
    protected $table         = 'master_barang';
    protected $primaryKey    = 'kode_brg';
    protected $allowedFields = ['kode_brg', 'nama_brg', 'jenis_brg', 'merk', 'created_at', 'updated_at', 'spesifikasi', 'id_satuan', 'is_active'];

    public function getMasterInventory($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where('kode_brg', $id)->first();
        }
    }

    public function getMasterBarang($id = false)
    {
        $builder = $this->select('master_barang.*, satuan.nama_satuan')
            ->join('satuan', 'satuan.satuan_id = master_barang.id_satuan', 'left')
            ->orderBy('master_barang.jenis_brg', 'ASC');

        if ($id === false) {
            return $builder->findAll();
        } else {
            return $builder->where('master_barang.kode_brg', $id)->first();
        }
    }

}
