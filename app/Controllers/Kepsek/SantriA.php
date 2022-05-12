<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SantriModel;

class SantriA extends ResourceController
{

    function __construct()
    {
        $this->SantriModel = new SantriModel();

        if (session()->roleUser != 'kepsek') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page kepala sekolah');
        }
    }

    public function index()
    {
        $data['santri'] = $this->SantriModel->getSantri();
        return view('kepsek/santri/indexSantri', $data);
    }

    public function inactive()
    {
        $data['inactive'] = $this->SantriModel->inActive();
        return view('kepsek/santri/noactive', $data);
    }
    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['santri'] = $this->SantriModel->where('santri_id', $id)->first();
        // dd($data);
        // jika tidak tidak ada di table
        if (empty($data['santri'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Id santri ' . $id . ' tidak ditemukan');
        }

        return view('kepsek/santri/detailSantri', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
