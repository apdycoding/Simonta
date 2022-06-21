<?php

namespace App\Controllers\Ws;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MdoaModel;

class Doa extends ResourceController
{

    function __construct()
    {
        $this->MdoaModel = new MdoaModel();
    }

    public function index()
    {
        return view('/ws/doai');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'mdoa' => $this->MdoaModel->getJoinMdoa($id),
        ];
        // dd($data);
        if (empty($data['mdoa'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('ws/groupDataD', $data);
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
