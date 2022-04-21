<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MhaditsModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;

class Masterhadits extends ResourceController
{
    function __construct()
    {
        $this->PengujiModel = new PengujiModel();
        $this->SantriModel = new SantriModel();
        $this->MhaditsModel = new MhaditsModel();

        if (session()->roleUser != 'staff') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page staff');
        }
    }

    public function index()
    {
        $data = [
            'mhadits' => $this->MhaditsModel->groupHadits(),
            // 'mhadits' => $this->MhaditsModel->getjoinsantri(),
        ];
        // dd($data);
        return view('staff/Masterhadits/indexData', $data);
    }

    public function show($id = null)
    {
        $data = [
            'mhadits' => $this->MhaditsModel->getjoinsantri($id),
        ];
        // dd($data);
        return view('/staff/Masterhadits/groupData', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            'penguji' => $this->PengujiModel->getAll(),
        ];
        // dd($data);
        return view('/staff/Masterhadits/newData', $data);
    }

    public function getDataSantri($var = null)
    {
        $santri_id = $this->request->getVar('santri_id');
        $data = $this->MhaditsModel->getData($santri_id);
        echo json_encode($data);
    }

    public function create()
    {
        if (!$this->validate([
            'santri_id'   => [
                'rules' => 'required',
            ],
            'dhadits_id'    => [
                'rules'     => 'required'
            ],
            'penguji_id'    => [
                'rules'     => 'required'
            ],
            'htgl_ujian'    => [
                'rules'     => 'required'
            ],
            'predikat'    => [
                'rules'     => 'required'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getVar();
        // dd($data);

        // ambil nama santri dengan join
        $idSantri = $data['santri_id'];

        $this->MhaditsModel->Save($data);
        $namaSantri = $this->MhaditsModel->getjoinsantri($idSantri);
        // dd($namaSantri);

        return redirect()->to('/staff/Masterhadits')->with('succes', 'Data hafalan hadits santri ' . '<code>' . $namaSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $namaSantri[0]['nama_hadits'] . '</code>' . ' berhasil disimpan ');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'editData'  => $this->MhaditsModel->where('Mhadits_id', $id)->first(),
            'getHadits'  => $this->MhaditsModel->getSantriHadits($id),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            'validation' => \Config\Services::validation(),
            'penguji' => $this->PengujiModel->getAll(),
        ];
        // dd($data);
        if (empty($data['editData'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('staff/Masterhadits/editData', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($mhadits_id = null)
    {
        if (!$this->validate([
            'santri_id'   => [
                'rules' => 'required',
            ],
            'dhadits_id'    => [
                'rules'     => 'required'
            ],
            'penguji_id'    => [
                'rules'     => 'required'
            ],
            'htgl_ujian'    => [
                'rules'     => 'required'
            ],
            'predikat'    => [
                'rules'     => 'required'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getVar();

        // ambil nama santri dengan join
        $idSantri = $this->request->getVar('santri_id');

        $this->MhaditsModel->update($mhadits_id, $data);
        $namaSantri = $this->MhaditsModel->getjoinsantri($idSantri);
        // dd($namaSantri[0]['name_santri']);

        return redirect()->to('/staff/Masterhadits')->with('warning', 'Data hafalan hadits santri ' . '<code>' . $namaSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $namaSantri[0]['nama_hadits'] . '</code>' . ' berhasil diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->MhaditsModel->delete($id);
        return redirect()->to('/staff/Masterhadits')->with('error', 'Data hafalan berhasil dihapus');
    }
}
