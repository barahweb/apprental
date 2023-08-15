<?php

namespace App\Models;

use CodeIgniter\Model;

class mjadwalsopir extends Model
{
    protected $table = 'jadwal_sopir';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_sopir', 'hari', 'jam_mulai', 'jam_akhir'];

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
    public function go_ubahuser($id_jadwal)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_jadwal' => $id_jadwal])
            ->get()->getResultArray();
    }
    public function ubah_user($data, $id_jadwal)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_jadwal' => $id_jadwal]);
    }
    public function hapus_user($id_jadwal)
    {
        return $this->db->table($this->table)
            ->delete(['id_jadwal' => $id_jadwal]);
    }
}
