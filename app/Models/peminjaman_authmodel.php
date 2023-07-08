<?php

namespace App\Models;

use CodeIgniter\Model;


class peminjaman_authmodel extends Model
{

    public function save_register($data)
    {
        $this->db->table('customerservice')->insert($data);
    }

    public function login($user, $password)
    {
        return $this->db->table('customerservice')
            ->where([
                'username' => $user,
                'password' => $password,

            ])->get()->getRowArray();
    }
    public function username($user)
    {
        return $this->db->table('customerservice')->where([
            'username' => $user
        ])->get()->getRowArray();
    }
}
