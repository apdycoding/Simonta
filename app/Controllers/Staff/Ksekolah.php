<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KepsekModel;

class Ksekolah extends ResourceController
{
    function __construct()
    {
        $this->KepsekModel = new KepsekModel();
        if (session()->roleUser != 'staff') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page staff');
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->KepsekModel->getPaginateKepsek(3, $keyword);
        return view('staff/ksekolah/indexs', $data);
    }

    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('staff/ksekolah/addKepsek');
    }

    public function create()
    {
        $data = $this->request->getVar();
        // dd($data);
        $this->KepsekModel->save($data);
        return redirect()->to('/staff/Ksekolah')->with('succes', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data['edit'] = $this->KepsekModel->where('kepsek_id', $id)->first();

        if (empty($data['edit'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('staff/Ksekolah/editKepsek', $data);
    }

    public function update($id = null)
    {
        $data = $this->request->getVar();
        $this->KepsekModel->update($id, $data);
        return redirect()->to('/staff/Ksekolah')->with('warning', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil diupdate');
    }

    public function delete($id = null)
    {
        $data = $this->KepsekModel->where('kepsek_id', $id)->first();
        // dd($data['name_kepsek']);
        $this->KepsekModel->delete($id);
        return redirect()->to('/staff/Ksekolah')->with('error', 'Data kepsek ' . '<code>' . $data['name_kepsek'] . '</code>' . ' berhasil dihapus');
    }
}
