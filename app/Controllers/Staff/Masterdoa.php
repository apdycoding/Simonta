<?php

namespace App\Controllers\Staff;

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

        if (session()->get('roleUser') != "staff") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page ditemukan di bagian staff');
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
        return view('/staff/Masterdoa/indexMdoa', $data);
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
        return view('staff/Masterdoa/groupmdoa', $data);
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
            'penguji' => $this->PengujiModel->getAll(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
        ];
        // dd($data);
        return view('/staff/Masterdoa/newmdoa', $data);
    }

    public function getDatadoa($id = null)
    {
        $santri_id = $this->request->getVar('santri_id');
        $data = $this->MdoaModel->getDataNotIn($santri_id);
        echo json_encode($data);
    }

    public function create()
    {
        if (!$this->validate([
            'santri_id' => [
                'rules' => 'required',
            ],
            'ddoa_id' => [
                'rules' => 'required',
            ],
            'dtgl_ujian' => [
                'rules' => 'required',
            ],
            'predikat' => [
                'rules' => 'required',
            ],
            'penguji_id' => [
                'rules' => 'required',
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $idDoa = $this->request->getVar('santri_id');

        $data = $this->request->getVar();
        // dd($data);
        $this->MdoaModel->Save($data);

        $nmSantri = $this->MdoaModel->getJoinMdoa($idDoa);
        // dd($nmSantri);
        return redirect()->to('/staff/Masterdoa')->with('succes', 'Data hafalan doa santri ' . '<code>' . $nmSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $nmSantri[0]['nama_doa'] . '</code>' . ' berhasil disimpan ');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'editData'  => $this->MdoaModel->where('mdoa_id', $id)->first(),
            'penguji' => $this->PengujiModel->getAll(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        if (empty($data['editData'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('staff/Masterdoa/editmdoa', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($iddoa = null)
    {
        if (!$this->validate([
            'santri_id' => [
                'rules' => 'required',
            ],
            'ddoa_id' => [
                'rules' => 'required',
            ],
            'dtgl_ujian' => [
                'rules' => 'required',
            ],
            'predikat' => [
                'rules' => 'required',
            ],
            'penguji_id' => [
                'rules' => 'required',
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $idDoa = $this->request->getVar('santri_id');

        $data = [
            'santri_id' => $this->request->getVar('santri_id'),
            'ddoa_id' => $this->request->getVar('ddoa_id'),
            'dtgl_ujian' => $this->request->getVar('dtgl_ujian'),
            'predikat' => $this->request->getVar('predikat'),
            'penguji_id' => $this->request->getVar('penguji_id'),
        ];
        // dd($data);
        $this->MdoaModel->update($iddoa, $data);

        $nmSantri = $this->MdoaModel->joinDdoa($idDoa);
        // dd($nmSantri);
        return redirect()->to('/staff/Masterdoa')->with('warning', 'Data hafalan doa santri ' . '<code>' . $nmSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $nmSantri[0]['nama_doa'] . '</code>' . ' berhasil diubah ');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->MdoaModel->getJoinId($id);
        // dd($data);
        $this->MdoaModel->delete($id);
        return redirect()->to('/staff/Masterdoa')->with('error', 'Data doa santri ' . '<code>' . $data[0]['name_santri'] . '</code>' . ' dan doa ' . '<code>' . $data[0]['nama_doa'] . '</code>' . ' berhasil dihapus');
    }
}
