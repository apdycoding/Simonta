<?php

namespace App\Controllers\Ws;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SurahModel;

class Surah extends ResourceController
{

    function __construct()
    {
        $this->surahModel = new SurahModel();
    }

    public function index()
    {
        return view('/ws/isurah');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['groups'] = $this->surahModel->getGroup($id);

        if (empty($data['groups'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Error Processing Request");
        }

        return view('ws/groupDataS', $data);
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
