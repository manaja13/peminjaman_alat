<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = [
        'kode_barang', 'id_master_barang', 'kondisi', 'spesifikasi',
        'id_satuan', 'lokasi', 'detail', 'qrcode', 'file', 'created_at', 'updated_at', 'deleted_at'
    ];

    // JOIN KE master_barang DAN satuan
    public function fetch_datas()
    {
        return $this
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->findAll();
    }

    public function getInventaris($id = false)
    {
        if ($id === false) {
            return $this
                ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
                ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
                ->findAll();
        }
        return $this->where(['kode_barang' => $id])
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->first();
    }

    // Cek semua inventaris by master barang (kode_brg)
    public function byMaster($id_master)
    {
        return $this
            ->where('id_master_barang', $id_master)
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->findAll();
    }

    // Insert / Update data pakai fitur Model bawaan CI
    public function insert_data($data)
    {
        return $this->insert($data);
    }

    public function update_data($id, $data)
    {
        return $this->update($id, $data);
    }
}
