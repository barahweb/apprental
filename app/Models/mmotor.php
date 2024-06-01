<?php

namespace App\Models;

use CodeIgniter\Model;

class mmotor extends Model
{
    protected $table = 'motor';
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
    public function go_ubahmotor($id_motor)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_motor' => $id_motor])
            ->get()->getResultArray();
    }
    public function ubah_user($data, $id_motor)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_motor' => $id_motor]);
    }
    public function hapus_user($id_motor)
    {
        return $this->db->table($this->table)
            ->delete(['id_motor' => $id_motor]);
    }
}
