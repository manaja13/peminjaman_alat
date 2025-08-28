<?php

namespace App\Models;

use CodeIgniter\Model;

class InventarisModel extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'kode_barang';
    protected $allowedFields = ['kode_barang', 'id_master_barang', 'kondisi', 'spesifikasi', 'id_satuan', 'lokasi', 'tgl_perolehan', 'qrcode', 'file', 'created_at', 'updated_at', 'deleted_at'];
    protected $db;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    // }

    public function getDataByDateRange($tanggalMulai, $tanggalAkhir)
    {
        // Menggunakan Query Builder untuk operasi select
        $query = $this->db->table('inventaris')
            ->where('tgl_perolehan >=', $tanggalMulai)
            ->where('tgl_perolehan <=', $tanggalAkhir)
            ->get();

        // Mengembalikan hasil query sebagai array
        return $query->getResultArray();
    }
    public function getInventaris($id = false)
    {
        if ($id == false) {
            return $this
                ->join('detail_master', 'detail_master.detail_master_id = inventaris.id_master_barang')
                ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
                ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
                ->findAll();
        }

        return $this->where(['kode_barang' => $id])
            ->join('detail_master', 'detail_master.detail_master_id = inventaris.id_master_barang')
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->first();
    }

    public function detailMaster($id_master)
    {
        return $this
            ->where('id_master_barang', $id_master)
            ->join('detail_master', 'detail_master.detail_master_id = inventaris.id_master_barang')
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->findAll();
    }
    public function getInven()
    {
        $hasil = $this->db->query("SELECT * FROM inventaris");
        return $hasil;
    }
    // public function save_inventaris()
    // {
    //     $data = array(
    //         'kode_barang' => $kode_barang,
    //         'nama_barang' => $nama_barang,
    //         'kondisi' => $kondisi,
    //         'merk' => $merk,
    //         'tipe' => $tipe,
    //         'satuan_barang' => $satuan_barang,
    //         'jumlah_barang' => $jumlah_barang,
    //         'tgl_perolehan' => $tgl_perolehan,
    //         'qrcode' => $qr,
    //     );
    //     $this->insert($data);
    // }

    //malam ini
    public function fetch_datas()
    {
        return $this
            ->join('master_barang', 'master_barang.kode_brg = inventaris.id_master_barang')
            ->join('satuan', 'satuan.satuan_id = inventaris.id_satuan')
            ->findAll();
    }

    public function fetch_data($id)
    {
        $this->db->where('kode_barang', $id);

        $query = $this->db->get($this->inventaris);

        return $query->row_array();
    }

    //build awal
    // function insert_data($qr)
    // {
    //     $this->insert($qr);

    //     return $this->db->affectedRows();
    // }

    public function insert_data($data)
    {
        $this->insert($data);

        return $this->db->affectedRows();
    }
    public function update_data($id, $data)
    {
        $this->update($id, $data);

        return $this->db->affectedRows();
    }
}
