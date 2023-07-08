<?php

namespace App\Models;

use CodeIgniter\Model;

class mpelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'username', 'alamat', 'gender', 'no_telepon', 'no_ktp', 'password'];

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
    public function go_ubahuser($id_pelanggan)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_pelanggan' => $id_pelanggan])
            ->get()->getResultArray();
    }
    public function ubah_user($data, $id_pelanggan)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_pelanggan' => $id_pelanggan]);
    }
    public function hapus_user($id_pelanggan)
    {
        return $this->db->table($this->table)
            ->delete(['id_pelanggan' => $id_pelanggan]);
    }
}
