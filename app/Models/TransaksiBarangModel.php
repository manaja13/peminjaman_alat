<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiBarangModel extends Model
{
    protected $table = 'transaksi_barang';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'kode_barang', 'id_master_barang', 'tanggal_barang_masuk',
        'jenis_transaksi', 'informasi_tambahan', 'jumlah_perubahan',
        'tanggal_barang_keluar', 'user_id'
    ];

    // Fungsi tambah log masuk/keluar
    public function tambahTransaksi($data)
    {
        return $this->insert($data);
    }

    public function riwayatTransaksi($kode_barang)
    {
        return $this->where('kode_barang', $kode_barang)->findAll();
    }
}
