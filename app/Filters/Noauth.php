<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Noauth implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {

            if (session()->get('roleUser') == 'adminsuper') {
                return redirect()->to('/');
            }
            if (session()->get('roleUser') == 'staff') {
                return redirect()->to('/');
            }
        }
        // if (session()->roleUser == '') {
        //     return redirect()->to(site_url('login'));
        // }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // if (session('roleUser') == 'staff') {
        //     // throw new \CodeIgniter\Exceptions\PageNotFoundException('tidak ditemukan');
        //     return redirect()->to('/');
        // }
    }
}
