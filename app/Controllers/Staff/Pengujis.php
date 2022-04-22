<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PengujiModel;


class Pengujis extends ResourceController
{

    function __construct()
    {
        $this->PengujiModel = new PengujiModel();
        if (session()->get('roleUser') != "staff") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data['penguji'] = $this->PengujiModel->getall();
        return view('staff/pengujis/index', $data);
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
        $data = [
            'validation'    => \Config\Services::validation(),
        ];
        return view('staff/pengujis/newPenguji', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nama_penguji'  => [
                'rules'     => 'required|is_unique[penguji.nama_penguji]',
                'errors'    => [
                    'required'  => 'nama penguji wajib diisi',
                    'is_unique' => 'nama penguji sudah ada di databases',
                ]
            ],
            'jk'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'jenis kelamin wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getVar();
        $this->PengujiModel->save($data);
        return redirect()->to('/staff/Pengujis')->with('success', 'Data penguji ' . '<code>' . $this->request->getVar('nama_penguji') . '</code>' . ' Berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'penguji'   =>   $this->PengujiModel->getAll($id),
            'validation'    => \Config\Services::validation(),
        ];
        if (empty($data['penguji'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('staff/pengujis/editPenguji', $data);
    }

    public function update($id = null)
    {
        $idPenguji = $this->request->getVar('penguji_id');
        // ambil data 
        $namaPenguji = $this->PengujiModel->getAll($idPenguji);
        if ($namaPenguji['nama_penguji'] == $this->request->getVar('nama_penguji')) {
            $rule = 'required';
        } else {
            $rule = 'required|is_unique[penguji.nama_penguji]';
        }

        if (!$this->validate([
            'nama_penguji'  => [
                'rules'     => $rule,
                'errors'    => [
                    'required'  => 'nama penguji wajib diisi',
                    'is_unique' => 'nama penguji sudah ada di databases',
                ]
            ],
            'jk'  => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'jenis kelamin wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getVar();
        $this->PengujiModel->update($id, $data);

        return redirect()->to('/staff/Pengujis')->with('success', 'Update penguji ' . '<code>' . $this->request->getVar('nama_penguji') . '</code>' . ' berhasil di update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->PengujiModel->where('penguji_id', $id)->first();
        // dd($data['nama_penguji']);
        $this->PengujiModel->delPenguji($id);
        return redirect()->to('/staff/Pengujis')->with('error', 'Data penguji ' . '<code>' . $data['nama_penguji'] . '</code>' . ' berhasil di hapus');
    }
}
