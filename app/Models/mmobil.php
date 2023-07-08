<?php

namespace App\Models;

use CodeIgniter\Model;

class mmobil extends Model
{
    protected $table = 'mobil';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_customerservice', 'id_type', 'merk', 'warna', 'no_plat', 'tahun', 'status', 'harga', 'gambar'];

    public function tampil()
    {
        return $this->db->table($this->table)
            ->select('*')
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table($this->table)
            ->insert($data);
    }
    public function go_ubahmobil($id_mobil)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_mobil' => $id_mobil])
            ->get()->getResultArray();
    }
    public function ubah_user($data, $id_mobil)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_mobil' => $id_mobil]);
    }
    public function hapus_user($id_mobil)
    {
        return $this->db->table($this->table)
            ->delete(['id_mobil' => $id_mobil]);
    }
}
