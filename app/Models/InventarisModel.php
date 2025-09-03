<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = [
        'kode_barang', 'id_master_barang', 'kondisi', 'spesifikasi',
        'id_satuan', 'ruangan_id', // FK ke ruangan
        'detail', 'qrcode', 'file', 'created_at', 'updated_at', 'deleted_at',
        'status' // 'tersedia', 'dipinjam', dst (opsional field status)
    ];

    // JOIN KE master_barang, satuan, ruangan
    public function fetch_datas()
    {
        return $this
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->join('ruangan', 'ruangan.id = inventaris.ruangan_id', 'left')
            ->findAll();
    }

    public function getInventaris($id = false)
    {
        if ($id === false) {
            return $this
                ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
                ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
                ->join('ruangan', 'ruangan.id = inventaris.ruangan_id', 'left')
                ->findAll();
        }
        return $this->where(['kode_barang' => $id])
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->join('ruangan', 'ruangan.id = inventaris.ruangan_id', 'left')
            ->first();
    }

    public function byMaster($id_master)
    {
        return $this
            ->where('id_master_barang', $id_master)
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->join('ruangan', 'ruangan.id = inventaris.ruangan_id', 'left')
            ->findAll();
    }

    public function insert_data($data)
    {
        return $this->insert($data);
    }

    public function update_data($id, $data)
    {
        return $this->update($id, $data);
    }
}
