<?php

namespace App\Controllers\Ws;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MhaditsModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;

class Hadits extends ResourceController
{
    function __construct()
    {
        // $this->PengujiModel = new PengujiModel();
        // $this->SantriModel = new SantriModel();
        $this->MhaditsModel = new MhaditsModel();
    }
    public function index()
    {
        return view('/ws/hadits');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'mhadits' => $this->MhaditsModel->getjoinsantri($id),
        ];
        // dd($data);
        return view('/ws/groupDataH', $data);
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
