<?php

namespace App\Controllers\Kepsek;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SurahModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;
use setasign\Fpdi\Fpdi;

class Mastersurah extends ResourceController
{
    function __construct()
    {
        $this->surahModel = new SurahModel();
        $this->SantriModel = new SantriModel();
        $this->PengujiModel = new PengujiModel();

        if (session()->get('roleUser') != "kepsek") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan di page kepsek');
            exit;
        }
    }

    public function index()
    {
        // $data['penguji'] = $this->PengujiModel->getAll();
        $data['surah'] = $this->surahModel->group();
        // dd($data);
        return view('kepsek/Mastersurah/index', $data);
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

        return view('kepsek/Mastersurah/groups', $data);
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
