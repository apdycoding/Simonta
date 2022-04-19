<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;

class Pages extends BaseController
{
    public function index()
    {

        if (session('roleUser') == 'adminsuper') {
            return view('home');
        } elseif (session('roleUser') == 'staff') {
            return view('home');
        } elseif (session('roleUser') == 'kepsek') {
            return view('home');
        } elseif (session('roleUser') == 'walisantri') {
            return view('home');
        }
    }
}
