<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TeacherModel;

class Guru extends ResourceController
{

    protected $modelName = 'App\Models\TeacherModel';

    function __construct()
    {
        // $this->GuruModel = new TeacherModel();
        if (session()->roleUser != 'staff') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page staff');
        }
    }

    public function index()
    {
        $data['teacher'] = $this->model->orderBy('name', 'asc')->findAll();
        return view('staff/guru/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        // ambil data berdasarkan id
        $idGuru['guru'] = $this->model->where('teacher_id', $id)
            ->first($id);

        if (empty($idGuru['guru'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('staff/guru/show', $idGuru);
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
        ];
        return view('staff/guru/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {

        if (!$this->validate([
            'nik_teacher' => [
                'rules'     => 'required|integer|is_unique[teacher.nik_teacher]',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                    'is_unique' => 'Nik Guru sudah terdaftar di Si-monta',
                    'integer'   => 'Inputan harus berupa angka',
                ]
            ],
            'name' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'gender' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'agama' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'alamat' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'tgl_lahir' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'tempat_lhr' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Ukuran maksimal 2 mb',
                    'is_image' => '{field} yang anda upload bukan image',
                    'mime_in'  => '{field} yang anda upload bukan image',
                ]
            ],
            'telp' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        // kelola gambar
        $fileFoto = $this->request->getFile('foto');
        // jika tidak file yang di upload
        if ($fileFoto->getError() == 4) {
            $nameRandom = 'default.png';
        } else {
            $nameRandom = $this->request->getVar('name') . "-" . date('d-m-Y') . "-" . $fileFoto->getRandomName();
            // pindahkan file ke polder img yang dibuat
            $fileFoto->move('img/guru', $nameRandom);
        }

        $data = [
            'nik_teacher' => $this->request->getVar('nik_teacher'),
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'tempat_lhr' => $this->request->getVar('tempat_lhr'),
            'foto' => $nameRandom,
            'telp' => $this->request->getVar('telp'),
        ];
        $this->model->save($data);
        return redirect()->to('/staff/guru')->with('success', 'Data Guru ' . '<code>' . $this->request->getVar('name') . '</code>' .  ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // ambil data guru berdasarkan id
        $teacherID = $this->model->where('teacher_id', $id)->first();

        // jika id tidak ada
        if ($teacherID) {
            $data = [
                'validation' => \Config\Services::validation(),
                'idteacher'  => $teacherID,
            ];
            return view('staff/guru/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // ambil id teacher
        $idteacher = $this->request->getVar('teacher_id');
        $nik = $this->model->where('teacher_id', $idteacher)->first();

        if ($nik['nik_teacher'] == $this->request->getVar('nik_teacher')) {
            $rules = 'required';
        } else {
            $rules = 'required|integer|is_unique[teacher.nik_teacher]';
        }

        if (!$this->validate([
            'nik_teacher' => [
                'rules'     => $rules,
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                    'is_unique' => 'Nik Guru sudah terdaftar di Si-monta',
                    'integer'   => 'Inputan harus berupa angka',
                ]
            ],
            'name' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'gender' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'agama' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'alamat' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'tgl_lahir' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'tempat_lhr' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    // 'uploaded' => '{field} wajib diupload'
                    'max_size' => '{field} Ukuran maksimal 2 mb',
                    'is_image' => '{field} yang anda upload bukan image',
                    'mime_in'  => '{field} yang anda upload bukan image',
                ]
            ],
            'telp' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'  => '{field} Wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        // kelola gambar
        if ($fileFoto->getError() == 4) {
            $nameFoto = $this->request->getVar('oldFoto');
        } else {

            // jika ada yang di upload
            $nameFoto = $this->request->getVar('name') . "-" . date('d-m-Y') . "-" . $fileFoto->getRandomName();
            // pindahkan gambar ke img publi
            $fileFoto->move('img/guru', $nameFoto);

            // cari gambar berdasarkan if
            $imageTeacher = $this->model->where('teacher_id', $id)->first($id);
            // dd($imageTeacher['foto']);

            // cek jika file gambarnya default
            if ($imageTeacher['foto'] != 'default.png') {
                // hapus file lama
                unlink('img/guru/' . $this->request->getVar('oldFoto'));
            }
        }


        $data = [
            'nik_teacher' => $this->request->getVar('nik_teacher'),
            'name' => $this->request->getVar('name'),
            'gender' => $this->request->getVar('gender'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'tempat_lhr' => $this->request->getVar('tempat_lhr'),
            'foto' => $nameFoto,
            'telp' => $this->request->getVar('telp'),
        ];
        // update berdasarkan id dari data yang ada
        $this->model->update($id, $data);
        return redirect()->to('/staff/guru')->with('success', 'Data guru ' . '<code>' . $this->request->getVar('name') . '</code>' . ' berhasil di update');
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
