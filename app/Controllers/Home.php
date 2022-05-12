<?php

namespace App\Controllers;

use App\Models\SantriModel;
use App\Models\UserModel;
use App\Models\DdoaModel;
use App\Models\DHaditsModel;
use App\Models\PengujiModel;
use App\Models\HaditsModel;
use App\Models\DoaModel;

class Home extends BaseController
{

    function __construct()
    {
        $this->SantriModel = new SantriModel();
        $this->UserModel = new UserModel();
        $this->DHaditsModel = new DHaditsModel();
        $this->DdoaModel = new DdoaModel();
        $this->PengujiModel = new PengujiModel();
        $this->HaditsModel = new HaditsModel();
        $this->DoaModel = new DoaModel();
    }

    public function index()
    {

        if (session('roleUser') == 'adminsuper') {
            // dd($data);
            $users = $this->UserModel->get()->resultID->num_rows;
            $santri = $this->SantriModel->SantriInActive();
            $santriAc = $this->SantriModel->SantriActive();
            $counthadits = $this->HaditsModel->countH();
            $countDoa = $this->DoaModel->countdoa();
            // dd($countdoa);
            $doa = $this->DHaditsModel->get()->resultID->num_rows;
            $hadits = $this->DdoaModel->get()->resultID->num_rows;
            $penguji = $this->PengujiModel->get()->resultID->num_rows;

            $total = [
                'totalDoa' => $doa,
                'totalSantri' => $santri,
                'santrinon' => $santriAc,
                'totalUsers' => $users,
                'hadits' => $hadits,
                'penguji' => $penguji,
                'counthadits' => $counthadits,
                'countdoa' => $countDoa,
            ];
            // dd($data);
            return view('/admin/homeAdmin', $total);
        } elseif (session('roleUser') == 'staff') {

            $santri = $this->SantriModel->SantriInActive();
            $santriAc = $this->SantriModel->SantriActive();
            $counthadits = $this->HaditsModel->countH();
            $countDoa = $this->DoaModel->countdoa();
            // dd($countdoa);
            $doa = $this->DHaditsModel->get()->resultID->num_rows;
            $hadits = $this->DdoaModel->get()->resultID->num_rows;

            $data = [
                'totalDoa' => $doa,
                'totalSantri' => $santri,
                'santrinon' => $santriAc,
                'hadits' => $hadits,
                'counthadits' => $counthadits,
                'countdoa' => $countDoa,
            ];

            return view('/staff/homeStaff', $data);
        } elseif (session('roleUser') == 'kepsek') {

            $santri = $this->SantriModel->SantriInActive();
            $santriAc = $this->SantriModel->SantriActive();
            $counthadits = $this->HaditsModel->countH();
            $countDoa = $this->DoaModel->countdoa();
            // dd($countdoa);
            $doa = $this->DHaditsModel->get()->resultID->num_rows;
            $hadits = $this->DdoaModel->get()->resultID->num_rows;

            $data = [
                'totalDoa' => $doa,
                'totalSantri' => $santri,
                'santrinon' => $santriAc,
                'hadits' => $hadits,
                'counthadits' => $counthadits,
                'countdoa' => $countDoa,
            ];

            // 
            return view('/kepsek/homeKepsek', $data);
        } elseif (session('roleUser') == 'walisantri') {
            // 
            return view('/home');
        }
        return redirect()->to('/login');
    }
}
