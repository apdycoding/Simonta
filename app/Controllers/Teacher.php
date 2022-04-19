<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use Google\Service\CloudSearch\Id;
use phpDocumentor\Reflection\Types\Null_;

class Teacher extends ResourcePresenter
{

    protected $modelName = 'App\Models\TeacherModel';


    function __construct()
    {
        if (session()->get('roleUser') != "adminsuper") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data['teacher'] = $this->model->orderBy('name', 'asc')->findAll();
        return view('admin/teacher/index', $data);
    }

    // ini untuk detail;
    public function show($id = null)
    {
        // ambil data berdasarkan id
        $idGuru['guru'] = $this->model->where('teacher_id', $id)
            ->first($id);

        if (empty($idGuru['guru'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/teacher/show', $idGuru);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/teacher/new', $data);
    }

    /**
     * Process the creation/insertion of a new resource object.
     * This should be a POST.
     *
     * @return mixed
     */
    // proses simpan data
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
        return redirect()->to('/teacher')->with('success', 'Data Guru ' . '<code>' . $this->request->getVar('name') . '</code>' .  ' berhasil disimpan');
    }

    public function edit($id = null)
    {
        // ambil data guru berdasarkan id
        $teacherID = $this->model->where('teacher_id', $id)->first();
        // dd($teacherID);

        // jika id tidak ada
        if ($teacherID) {
            $data = [
                'validation' => \Config\Services::validation(),
                'idteacher'  => $teacherID,
            ];
            return view('admin/teacher/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

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
        return redirect()->to('/teacher')->with('success', 'Data guru ' . '<code>' . $this->request->getVar('name') . '</code>' . ' berhasil di update');
    }


    public function remove($id = null)
    {
        // 
    }


    // fungsi hapus untuk delete tanpa menghapus gambar || softdelete
    public function delete($id = null)
    {
        $Image = $this->model->where('teacher_id', $id)->first();
        // dd($Image);

        // // cek jika file gambarnya default
        // if ($Image['foto'] != 'default.png') {
        //     // hapus gambar
        //     unlink('img/guru/' . $Image['foto']);
        // }

        $this->model->delete($id);
        return redirect()->to('/teacher')->with('success', 'Data guru ' . '<code>' . $Image['name'] . '</code>' . ' berhasil di hapus');
    }


    // bagian softdelete resotore dan delete permanen
    public function showData()
    {
        $data['teacher'] = $this->model->orderBy('name', 'asc')->onlyDeleted()->findAll();
        return view('admin/teacher/indexSoft', $data);
    }

    // harus menggunakan query builder untuk restore data
    public function restore($id = null)
    {

        $query = $this->db = \Config\Database::connect();

        // jika ada id maka restore satu persatu
        if ($id != null) {
            $query->table('teacher')
                ->set('deleted_at', null, true)
                ->where('teacher_id', $id)
                ->update();

            if ($query->affectedRows() > 0) {
                return redirect()->to('/teacher/showData')->with('success', 'Satu data guru berhasil di restore');
            }
        } else {
            // jika tidak ada id maka restore semuanya
            $query->table('teacher')
                ->set('deleted_at', null, true)
                ->where('deleted_at is NOT NULL', null, false)
                ->update();

            if ($query->affectedRows() > 0) {
                return redirect()->to('/teacher/showData')->with('success', 'Semua data guru berhasil di restore');
            }
        }
    }
    // delete permananen
    public function deletePermanen($id = null)
    {
        // ambil foto berdasarkan id dengan query builder
        $query = $this->db = \Config\Database::connect();
        $del = $query->table('teacher')
            // ->set('deleted_at', null, true)
            ->where('teacher_id', $id)
            ->get();

        $data = $del->getResultArray();
        $name = $data[0]['name'];
        $image = $data[0]['foto'];


        // if ($id != null) {
        // }

        // cek jika file gambarnya default
        if ($image != 'default.png') {
            // hapus gambar
            unlink('img/guru/' . $image);
        }

        $this->model->delete($id, true);
        return redirect()->to('/teacher/showData')->with('error', 'satu data guru  ' . '<code>' . $name . '</code>' . ' berhasil dihapus secara permanens');
        // paramameter untuk menghapus data yang softdelete
        // tanpa true maka data akan di hapus softdelete
    }


    // public function delete2()
    // {
    //     // ambil foto berdasarkan id dengan query builder
    //     $query = $this->db = \Config\Database::connect();
    //     $del = $query->table('teacher')
    //         // ->set('deleted_at', null, true)
    //         ->where('teacher_id', $id)
    //         ->get();

    //     $data = $del->getResultArray();
    //     $name = $data[0]['name'];
    //     $image = $data[0]['foto'];


    //     // if ($id != null) {
    //     // }

    //     // cek jika file gambarnya default
    //     if ($image != 'default.png') {
    //         // hapus gambar
    //         unlink('img/guru/' . $image);
    //     }

    //     $this->model->purgeDeleted();
    //     return redirect()->to('/teacher/showData')->with('error', 'Semua data trash berhasil dihapus secara permanens');
    //     // paramameter untuk menghapus data yang softdelete
    //     // tanpa true maka data akan di hapus softdelete
    // }
}
