<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DHaditsModel;

class Datahadits extends ResourceController
{
    function __construct()
    {
        $this->DHaditsModel = new DHaditsModel();
        if (session()->roleUser != 'staff') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page staff');
        }
    }

    public function index()
    {
        $data['dhadits'] = $this->DHaditsModel->orderBy('nama_hadits', 'asc')->findAll();
        return view('staff/datahadits/indexDhadits', $data);
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
        return view('staff/datahadits/newDhadits', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nama_hadits'   => [
                'rules' => 'required',
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getVar();
        // dd($data);
        $this->DHaditsModel->Save($data);
        return redirect()->to('/staff/Datahadits')->with('succes', 'Data ' . '<code>' . $this->request->getVar('nama_hadits') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
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
        return view('staff/Datahadits/editData', $data);
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
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $data = $this->request->getVar();
        $this->DHaditsModel->update($id, $data);
        return redirect()->to('/staff/Datahadits')->with('warning', 'Data ' . '<code>' . $this->request->getVar('nama_hadits') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $name = $this->DHaditsModel->where('dhadits_id', $id)->first();
        // dd($name);
        $this->DHaditsModel->delete($id);
        return redirect()->to('/staff/Datahadits')->with('error', 'Data hadits ' . '<code>' . $name['nama_hadits'] . '</code>' . ' berhasil dihapus');
    }
}
