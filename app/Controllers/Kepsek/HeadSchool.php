<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KepsekModel;

class HeadSchool extends ResourceController
{

    function __construct()
    {
        $this->KepsekModel = new KepsekModel();
        if (session()->roleUser != 'kepsek') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page kepala sekolah');
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->KepsekModel->getPaginateKepsek(3, $keyword);
        return view('kepsek/ksekolah/indexs', $data);
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
        return view('kepsek/ksekolah/addKepsek');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        // dd($data);
        $this->KepsekModel->save($data);
        return redirect()->to('/kepsek/HeadSchool')->with('succes', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil disimpan');
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
        return view('kepsek/Ksekolah/editKepsek', $data);
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
        return redirect()->to('/kepsek/HeadSchool')->with('warning', 'Data kepsek ' . '<code>' . $this->request->getVar('name_kepsek') . '</code>' . ' berhasil diupdate');
    }

    public function delete($id = null)
    {
        $data = $this->KepsekModel->where('kepsek_id', $id)->first();
        // dd($data['name_kepsek']);
        $this->KepsekModel->delete($id);
        return redirect()->to('/kepsek/HeadSchool')->with('error', 'Data kepsek ' . '<code>' . $data['name_kepsek'] . '</code>' . ' berhasil dihapus');
    }
}
