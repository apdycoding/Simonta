<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KepsekModel;

class Kepsek extends ResourceController
{
    function __construct()
    {
        $this->KepsekModel = new KepsekModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->KepsekModel->getPaginateKepsek(3, $keyword);
        return view('admin/kepsek/indexKepsek', $data);
    }


    public function show($id = null)
    {
        //
    }

    public function new()
    {
        return view('admin/kepsek/addKepsek');
    }

    public function create()
    {
        $data = $this->request->getVar();
        $this->KepsekModel->save($data);
        return redirect()->to('/kepsek')->with('succes', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['edit'] = $this->KepsekModel->where('kepsek_id', $id)->first();

        if (empty($data['edit'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/kepsek/editKepsek', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getVar();
        $this->KepsekModel->update($id, $data);
        return redirect()->to('/kepsek')->with('warning', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil diupdate');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->KepsekModel->where('kepsek_id', $id)->first();
        // dd($data['name_kepsek']);
        $this->KepsekModel->delete($id);
        return redirect()->to('/kepsek')->with('error', 'Data kepsek ' . '<code>' . $data['name_kepsek'] . '</code>' . ' berhasil dihapus');
    }
}
