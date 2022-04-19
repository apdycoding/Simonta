<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DHaditsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DHadits extends ResourceController
{

    function __construct()
    {
        $this->DHaditsModel = new DHaditsModel();

        if (session()->get('roleUser') != "adminsuper") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data['dhadits'] = $this->DHaditsModel->orderBy('nama_hadits', 'asc')->findAll();
        return view('admin/masterData/dhadits/indexDhadits', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/masterData/dhadits/newDhadits', $data);
    }


    public function create()
    {
        if (!$this->validate([
            'nama_hadits'   => [
                'rules' => 'required',
                // 'errors'    => [
                //     'required'  => 'Penguji ujian wajib diisi',
                // ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getVar();
        $this->DHaditsModel->Save($data);
        return redirect()->to('/admin/dhadits')->with('succes', 'Data ' . '<code>' . $this->request->getVar('nama_hadits') . '</code>' . ' berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'edit' => $this->DHaditsModel->where('dhadits_id', $id)->first(),
        ];
        // dd($data);
        if (empty($data['edit'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('admin/masterData/dhadits/editData', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'nama_hadits'   => [
                'rules' => 'required',
                // 'errors'    => [
                //     'required'  => 'Penguji ujian wajib diisi',
                // ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getVar();
        $this->DHaditsModel->update($id, $data);
        return redirect()->to('/admin/dhadits')->with('warning', 'Data ' . '<code>' . $this->request->getVar('nama_hadits') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $nama = $this->DHaditsModel->where('dhadits_id', $id)->first();
        // dd($nama['nama_hadits']);
        $this->DHaditsModel->delete($id);
        return redirect()->to('/admin/dhadits')->with('error', 'Data ' . '<code>' . $nama['nama_hadits'] . '</code>' . ' berhasil dihapus');
    }
}
