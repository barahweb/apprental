<?php

namespace App\Models;

use CodeIgniter\Model;

class mtype extends Model
{
    protected $table = 'type';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_type'];

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
    public function go_ubahuser($id_type)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where(['id_type' => $id_type])
            ->get()->getResultArray();
    }
    public function ubah_type($data, $id_type)
    {
        return $this->db->table($this->table)
            ->update($data, ['id_type' => $id_type]);
    }
    public function hapus_user($id_type)
    {
        return $this->db->table($this->table)
            ->delete(['id_type' => $id_type]);
    }
}
