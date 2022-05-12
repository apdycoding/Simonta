<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MdoaModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;

class Masterdoa extends ResourceController
{
    function __construct()
    {
        $this->PengujiModel = new PengujiModel();
        $this->MdoaModel = new MdoaModel();
        $this->SantriModel = new SantriModel();

        if (session()->get('roleUser') != "kepsek") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page ditemukan di bagian kepsek');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data = [
            'mdoa' => $this->MdoaModel->grupMdoa(),
        ];
        // dd($data);
        return view('/kepsek/Masterdoa/indexMdoa', $data);
    }

    public function show($id = null)
    {
        $data = [
            'mdoa' => $this->MdoaModel->getJoinMdoa($id),
        ];
        // dd($data);
        if (empty($data['mdoa'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('kepsek/Masterdoa/groupmdoa', $data);
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
