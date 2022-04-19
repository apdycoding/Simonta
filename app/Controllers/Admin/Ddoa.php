<?php

namespace App\Controllers\Admin;

use App\Models\DdoaModel;
use CodeIgniter\RESTful\ResourceController;

class Ddoa extends ResourceController
{

    function __construct()
    {
        $this->DdoaModel = new DdoaModel();
        if (session()->get('roleUser') != "adminsuper") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data = [
            'ddoa' => $this->DdoaModel->orderBy('nama_doa', 'asc')->findAll()
        ];
        return view('admin/masterData/ddoa/indexDdoa', $data);
    }


    public function show($id = null)
    {
        //
    }


    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/masterData/ddoa/newDdoa', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nama_doa' => [
                'rules' => 'required',
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $namaDoa = $this->request->getVar('nama_doa');
        $data = $this->request->getVar();
        $this->DdoaModel->Save($data);

        return redirect()->to('/admin/Ddoa')->with('succes', 'Data doa ' . '<code>' . $namaDoa . '</code>' . ' berhasil disimpan');
    }

    public function edit($idDoa = null)
    {
        $data = [
            'edit' => $this->DdoaModel->where('ddoa_id', $idDoa)->first(),
            'validation' => \Config\Services::validation(),
        ];

        if (empty($data['edit'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('admin/masterData/ddoa/editDoa', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'nama_doa' => [
                'rules' => 'required',
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $namaDoa = $this->request->getVar('nama_doa');
        $data = $this->request->getVar();
        $this->DdoaModel->update($id, $data);

        return redirect()->to('/admin/Ddoa')->with('warning', 'Data doa ' . '<code>' . $namaDoa . '</code>' . ' berhasil diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $namadoa = $this->DdoaModel->where('ddoa_id', $id)->first();
        $this->DdoaModel->delete($id);

        return redirect()->to('/admin/Ddoa')->with('error', 'Data doa ' . '<code>' . $namadoa['nama_doa'] . '</code>' . ' berhasil didelete');
        //
    }
}
