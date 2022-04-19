<?php

namespace App\Controllers;

use \App\Models\SantriModel;
use \App\Models\SurahModel;
use App\Models\PengujiModel;
use App\Models\HaditsModel;

class Santri extends BaseController
{

    protected $santriModel;

    public function __construct()
    {
        $this->santriModel = new SantriModel();
        $this->surahModel = new SurahModel();
        $this->PengujiModel = new PengujiModel();
        $this->HaditsModel = new HaditsModel();

        if (session()->get('roleUser') != "adminsuper") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }
    public function index()
    {
        // $request = $this->santriModel->findAll();
        $data['santri'] = $this->santriModel->getSantri();

        return view('admin/santri/index', $data);
    }

    public function inactive()
    {
        $data['santri'] = $this->santriModel->inActive();
        return view('admin/santri/inactive', $data);
    }

    public function detail($id)
    {
        $santri['santri'] = $this->santriModel->getSantri($id);

        // jika tidak tidak ada di table
        if (empty($santri['santri'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Id santri ' . $id . ' tidak ditemukan');
        }
        return view('admin/santri/detail', $santri);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/santri/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nik_santri' => [
                'rules' => 'required|integer|is_unique[santri.nik_santri]|max_length[16]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'name_santri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'tempat_lhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'statusSantri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'photos' => [
                'rules' => 'max_size[photos,2048]|is_image[photos]|mime_in[photos,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    // 'uploaded' => '{field} wajib diupload'
                    'max_size' => '{field} Ukuran maksimal 2 mb',
                    'is_image' => '{field} yang anda upload bukan image',
                    'mime_in'  => '{field} yang anda upload bukan image',
                ]
            ],
            'nik_ibu' => [
                'rules' => 'required|integer|is_unique[santri.nik_ibu]|max_length[16]
                ',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'pekerjaan_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'status_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'phoneIbu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'nik_ayah' => [
                'rules' => 'required|integer|is_unique[santri.nik_ayah]|max_length[16]
                ',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'nama_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'pekerjaan_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'status_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'phoneAyah' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],

        ])) {
            return redirect()->back()->withInput();
        }

        // kelola gambar
        $fileFoto = $this->request->getFile('photos');
        // ambil nama file foto

        if ($fileFoto->getError() == 4) {
            $nameRandom = 'default.png';
        } else {
            $nameRandom = $this->request->getVar('name_santri') . "-" . date('d-m-Y') . "-" . $fileFoto->getRandomName();
            // pindahkan file ke polder img yang dibuat
            $fileFoto->move('img', $nameRandom);
        }

        $data = [
            'nik_santri' => $this->request->getVar('nik_santri'),
            'name_santri' => $this->request->getVar('name_santri'),
            'gender' => $this->request->getVar('gender'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'tempat_lhr' => $this->request->getVar('tempat_lhr'),
            'statusSantri' => $this->request->getVar('statusSantri'),
            'photos' => $nameRandom,
            'nik_ibu' => $this->request->getVar('nik_ibu'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'status_ibu' => $this->request->getVar('status_ibu'),
            'phoneIbu' => $this->request->getVar('phoneIbu'),
            'nik_ayah' => $this->request->getVar('nik_ayah'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'status_ayah' => $this->request->getVar('status_ayah'),
            'phoneAyah' => $this->request->getVar('phoneAyah'),
        ];
        // dd($data);
        $this->santriModel->insert($data);

        return redirect()->to('santri')->with('succes', 'Data santri ' . '<code>' . $this->request->getVar('name_santri') . '</code>' . ' berhasil disimpan');
    }

    public function trash($id)
    {
        // cari gambar berdasarkan id
        $imageSantri = $this->santriModel->find($id);

        // cek jika file gambarnya default
        if ($imageSantri['photos'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $imageSantri['photos']);
        }

        $this->santriModel->delete($id);
        return redirect()->to('/santri')->with('succes', 'Data santri berhasil di hapus');
    }

    public function edit($id)
    {

        $idSantri = $this->santriModel->getSantri($id);

        // jika ada id
        if ($idSantri) {
            $data = [
                // 'validation' => \Config\Services::validation(),
                'santri'     => $idSantri,
            ];
            return view('admin/santri/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        // ambil id santri
        $santriId = $this->request->getVar('santri_id');
        // ambil data nik santri dari model
        $nikSantri = $this->santriModel->getSantri($santriId);
        if ($nikSantri['nik_santri'] == $this->request->getVar('nik_santri')) {
            $rules = 'required';
        } else {
            $rules = 'required|integer|is_unique[santri.nik_santri]';
        }

        if ($nikSantri['nik_ibu'] == $this->request->getVar('nik_ibu')) {
            $rules_ibu = 'required';
        } else {
            $rules_ibu = 'required|integer|is_unique[santri.nik_ibu]';
        }

        if ($nikSantri['nik_ayah'] == $this->request->getVar('nik_ayah')) {
            $rules_ayah = 'required';
        } else {
            $rules_ayah = 'required|integer|is_unique[santri.nik_ayah]';
        }


        // validasi form edit
        $validate = $this->validate([
            'nik_santri' => [
                'rules' => $rules,
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'name_santri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'tempat_lhr' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'photos' => [
                'rules' => 'max_size[photos,2048]|is_image[photos]|mime_in[photos,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    // 'uploaded' => '{field} wajib diupload'
                    'max_size' => '{field} Ukuran maksimal 2 mb',
                    'is_image' => '{field} yang anda upload bukan image',
                    'mime_in'  => '{field} yang anda upload bukan image',
                ]
            ],
            'statusSantri' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'nik_ibu' => [
                'rules' => $rules_ibu,
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'pekerjaan_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'status_ibu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'phoneIbu' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'nik_ayah' => [
                'rules' => $rules_ayah,
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'integer' => '{field} Inputan nik santri harus berupa angka',
                    'is_unique' => '{field} Nik santri sudah terdaftar di databases',
                    'max_length' => '{field} Inputan lebih dari ketentuan'
                ]
            ],
            'nama_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'pekerjaan_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'status_ayah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
            'phoneAyah' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ]
            ],
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $fileImage = $this->request->getFile('photos');

        // cek gambar apakah tetap gambar lama
        // jika file sampul error/kosong
        if ($fileImage->getError() == 4) {
            // jika kosong tidak ada yang diupload ambil foto lama
            $namaFoto = $this->request->getVar('fotoLama');
        } else {

            // jika ada yang di upload
            $namaFoto = $this->request->getVar('name_santri') . "-" . date('d-m-Y') . "-" . $fileImage->getRandomName();
            // pindahkan gambar ke img publi
            $fileImage->move('img', $namaFoto);

            // cari gambar berdasarkan id
            $imageSantri = $this->santriModel->find($id);

            // cek jika file gambarnya default
            if ($imageSantri['photos'] != 'default.png') {
                // hapus file lama
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        // ambil semua data
        // $data = $this->request->getVar();
        $data = [
            'nik_santri' => $this->request->getVar('nik_santri'),
            'name_santri' => $this->request->getVar('name_santri'),
            'gender' => $this->request->getVar('gender'),
            'agama' => $this->request->getVar('agama'),
            'alamat' => $this->request->getVar('alamat'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'tempat_lhr' => $this->request->getVar('tempat_lhr'),
            'statusSantri' => $this->request->getVar('statusSantri'),
            'photos' => $namaFoto,
            'nik_ibu' => $this->request->getVar('nik_ibu'),
            'nama_ibu' => $this->request->getVar('nama_ibu'),
            'pekerjaan_ibu' => $this->request->getVar('pekerjaan_ibu'),
            'status_ibu' => $this->request->getVar('status_ibu'),
            'phoneIbu' => $this->request->getVar('phoneIbu'),
            'nik_ayah' => $this->request->getVar('nik_ayah'),
            'nama_ayah' => $this->request->getVar('nama_ayah'),
            'pekerjaan_ayah' => $this->request->getVar('pekerjaan_ayah'),
            'status_ayah' => $this->request->getVar('status_ayah'),
            'phoneAyah' => $this->request->getVar('phoneAyah'),
        ];

        // $this->santriModel->save($data);
        $this->santriModel->update($id, $data);
        return redirect()->to('santri')->with('succes', 'Data santri ' . '<code>' . $this->request->getVar('name_santri') . '</code>' . ' berhasil di update');
    }

    public function updateStatus($id)
    {
        $status = $this->santriModel->find($id);
        if ($status['statusSantri'] == '1') {
            $change = '0';
        } else {
            $change = '1';
        }

        $data = [
            'statusSantri' => $change,
        ];

        $this->santriModel->update($id, $data);
        return redirect()->to('santri')->with('warning', 'Status santri berhasil di ubah');
    }

    public function groupData($id)
    {
        // $data['namaPenguji'] = $this->PengujiModel->joinPenguji();
        // dd($namaPenguji);

        $data['groups'] = $this->surahModel->getGroup($id);
        // dd($data);
        return view('admin/surah/groups', $data);
    }
}
