<?php
namespace App\Models;

use CodeIgniter\Model;

class tipeBarangModel extends Model
{
    protected $table            = 'detail_master';
    protected $primaryKey       = 'detail_master_id';
    protected $allowedFields    = ['tipe_barang', 'master_barang'];
    protected $useAutoIncrement = true;

    public function getTipeBarang($id_tipe_barang = false)
    {
        if ($id_tipe_barang == false) {
            return $this
                ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
                ->findAll();
        }
        return $this
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->where(['detail_master_id' => $id_tipe_barang])
            ->first();
    }

    // Di model masterBarangModel.php
    public function getMasterInventory($kode_brg = false)
    {
        if ($kode_brg === false) {
            return $this->findAll();
        }
        return $this->where('kode_brg', $kode_brg)->first();
    }

// Ambil tipe barang tertentu (misal: inv, atk)
    public function getByJenis($jenis_brg = false)
    {
        if ($jenis_brg === false) {
            return $this->findAll();
        }
        return $this->where('jenis_brg', $jenis_brg)->findAll();
    }

    public function getMasterAtk($id = false)
    {
        if ($id == false) {
            return $this
                ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
                // ->where(['master_barang.jenis_brg' => 'atk'])
                ->findAll();
        }
        return $this
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            // ->where(['master_barang.jenis_brg' => 'atk'])
            ->where(['detail_master_id' => $id])
            ->first();
    }

    public function getMaster($master_barang)
    {
        return $this
            ->where(['master_barang' => $master_barang])
            ->join('master_barang', 'master_barang.kode_brg = detail_master.master_barang')
            ->findAll();
    }
}
