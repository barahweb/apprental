<?php

namespace App\Controllers;

//use App\Models\AuthModel;
use App\Models\peminjaman_authmodel;

class peminjaman_auth extends BaseController
{
    protected $lib;
    public function __construct()
    {
        helper('form');
        $this->model_auth = new peminjaman_authmodel();
    }

    public function index()
    {
        $data = array(
            'title' => 'MTG Trans',
        );
        return view('tampilan/dashboard', $data);
    }

    public function login()
    {
        $data = [
            'log' => FALSE,
        ];
        session()->set($data);
        return view('/login/login', $data);
    }

    public function cek_login()
    {
        //jika valid
        $user = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // $password = md5($password1);
        $random1 = $this->request->getPost('random1');
        $random2 = $this->request->getPost('random2');
        $hasiljawab = $this->request->getPost('jawaban');
        $total = $random1 + $random2;
        // echo $user . '-' . $password . '-' . $random1 . '-' . $random2 . '-' . $hasiljawab . '-' . $total;
        // die;
        //cek captcha
        if ($total != $hasiljawab) {
            session()->setFlashdata('status_text', 'Login gagal, Captcha Salah!');
            return redirect()->to(base_url('/login'))
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        } else {
            $cek = $this->model_auth->login($user, $password);
            if ($cek) {
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('id_customerservice', $cek['id_customerservice']);
                session()->set('nama_customerservice', $cek['nama_customerservice']);
                return redirect()->to('/home');
            } else {
                session()->setFlashdata('status_text', 'Login gagal, Username Atau Password Salah!');
                return redirect()->to(base_url('/login'))
                    ->with('status_icon', 'error')
                    ->with('status', 'Gagal!');
            }
        }
    }
    public function logout()
    {
        session()->remove('id_customerservice');
        session()->remove('nama_customerservice');
        session()->remove('username');
        session()->destroy();
        session()->set(['log' => FALSE]);
        return redirect()->to(base_url('/login'));
    }

    public function lupa()
    {
        return view('login/lupa_password');
    }

    public function formubah()
    {
        return view('login/ubah_password');
    }

    public function cek_username()
    {
        $user = $this->request->getPost('username');
        $cek = $this->model_auth->username($user);
        if ($cek) {
            session()->setFlashdata('username', $user);
            session()->setFlashdata('status_text', 'Data Terdaftar!');
            return redirect()->to(base_url('/peminjaman_auth/ubahpass'))
                ->with('status_icon', 'success')
                ->with('status', 'Berhasil');
        } else {
            session()->setFlashdata('status_text', 'User Tidak Terdaftar!');
            return redirect()->to(base_url('/lupa_password'))
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        }
        // echo $user;
    }

    public function ubahpass()
    {
        $user = $this->request->getPost('username');
        $pass1 = $this->request->getPost('password');
        $db = \Config\Database::connect();
        $update = $db->query("UPDATE customerservice SET password='$pass1' WHERE username='$user'");
        if ($update) {
            session()->setFlashdata('status_text', 'Password berhasil di reset!');
            return redirect()->to(base_url('/login'))
                ->with('status_icon', 'success')
                ->with('status', 'Berhasil');
        } else {
            session()->setFlashdata('status_text', 'Password gagal di reset!');
            return redirect()->to(base_url('/login'))
                ->with('status_icon', 'error')
                ->with('status', 'Gagal!');
        }
    }
}
