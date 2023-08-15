<?php

namespace App\Models;

use CodeIgniter\Model;

class msopir extends Model
{
    protected $table = 'sopir';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_sopir', 'ketersediaan', 'alamat', 'gender', 'no_telepon', 'no_ktp'];

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
    public function go_ubahuser($id_sopir)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_sopir' => $id_sopir])
            ->get()->getResultArray();
    }
    public function ubah_user($data, $id_sopir)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_sopir' => $id_sopir]);
    }
    public function hapus_user($id_sopir)
    {
        return $this->db->table($this->table)
            ->delete(['id_sopir' => $id_sopir]);
    }
}
