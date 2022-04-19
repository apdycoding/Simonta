<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MdoaModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;

class Datadoa extends ResourceController
{

    function __construct()
    {
        $this->PengujiModel = new PengujiModel();
        $this->MdoaModel = new MdoaModel();
        $this->SantriModel = new SantriModel();

        if (session()->get('roleUser') != "adminsuper") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
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
        return view('admin/masterData/mdoa/indexMdoa', $data);
    }


    // tampil data group
    public function show($id = null)
    {
        $data = [
            'mdoa' => $this->MdoaModel->getJoinMdoa($id),
        ];
        // dd($data);
        if (empty($data['mdoa'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/masterData/mdoa/groupmdoa', $data);
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'penguji' => $this->PengujiModel->getAll(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->getName(),
        ];
        // dd($data);
        return view('admin/masterData/mdoa/newmdoa', $data);
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
        return redirect()->to('/admin/Datadoa')->with('succes', 'Data hafalan doa santri ' . '<code>' . $nmSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $nmSantri[0]['nama_doa'] . '</code>' . ' berhasil disimpan ');
    }

    public function edit($id = null)
    {
        $data = [
            'editData'  => $this->MdoaModel->where('mdoa_id', $id)->first(),
            // 'getHadits'  => $this->MdoaModel->getSantriHadits($id),
            'penguji' => $this->PengujiModel->getAll(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->getName(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        if (empty($data['editData'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('admin/masterData/mdoa/editmdoa', $data);
    }

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
        return redirect()->to('/admin/Datadoa')->with('warning', 'Data hafalan doa santri ' . '<code>' . $nmSantri[0]['name_santri'] . '</code>' . ' dan ' . '<code>' . $nmSantri[0]['nama_doa'] . '</code>' . ' berhasil diubah ');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->MdoaModel->delete($id);
        return redirect()->to('/admin/Datadoa')->with('error', 'Data doa berhasil dihapus');
    }
}
