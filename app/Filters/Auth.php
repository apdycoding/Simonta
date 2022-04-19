<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Auth implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(site_url('login'));
        }
        // if (session('roleUser') == '') {
        //     return redirect()->to(site_url('login'));
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // if (session('roleUser') == 'adminsuper') {
        //     // throw new \CodeIgniter\Exceptions\PageNotFoundException('tidak ditemukan');
        //     return redirect()->to('/');
        // }
    }
}
