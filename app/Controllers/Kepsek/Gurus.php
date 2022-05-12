<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;

class Gurus extends ResourceController
{


    protected $modelName = 'App\Models\TeacherModel';

    function __construct()
    {
        // $this->GuruModel = new TeacherModel();
        if (session()->roleUser != 'kepsek') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page kepala sekolah');
        }
    }

    public function index()
    {
        $data['teacher'] = $this->model->orderBy('name', 'asc')->findAll();
        return view('kepsek/guru/index', $data);
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
