<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DdoaModel;

class Datadoa extends ResourceController
{
    function __construct()
    {
        $this->DdoaModel = new DdoaModel();
        if (session()->get('roleUser') != "kepsek") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan di page kepsek');
            exit;
        }
    }

    public function index()
    {
        $data = [
            'ddoa' => $this->DdoaModel->orderBy('nama_doa', 'asc')->findAll()
        ];
        return view('/kepsek/datadoa/indexDdoa', $data);
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
