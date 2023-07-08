<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class logincust implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('log') == FALSE) {
            return redirect()->to('/logincust');
        }
    }

    //--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        // $session = session();
        // if (session()->get('log') == TRUE) {
        //     session()->setFlashdata('textlogin', 'Hallo ' . session()->get('nama'));
        //     return redirect()->to('/dashboard');
        // }
    }
}
