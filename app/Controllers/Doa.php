<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DoaModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;
use App\Models\MdoaModel;
use setasign\Fpdi\Fpdi;

class Doa extends ResourceController
{

    function __construct()
    {
        $this->SantriModel = new SantriModel();
        $this->PengujiModel = new PengujiModel();
        $this->DoaModel = new DoaModel();
        $this->MdoaModel = new MdoaModel();

        if (session()->get('roleUser') != "adminsuper") {

            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data = [
            'doa' => $this->DoaModel->getAllDoa(),
        ];
        // dd($data);

        return view('admin/doa/indexDoa', $data);
    }

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
            'validation' => \Config\Services::validation(),
            'names' => $this->SantriModel->showName(),
            // 'penguji' => $this->PengujiModel->getAll(),
        ];
        return view('admin/doa/newDoa', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // validation input

        if (!$this->validate([
            'santri_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama santri wajib diisi',
                ]
            ],
            'tglLulus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal ujian santri wajib diisi',
                ]
            ],
            'predikat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Predikat kelulusan santri wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $idSantri = $this->request->getVar('santri_id');
        $names = $this->SantriModel->getName($idSantri);
        // dd($names[0]['name_santri']);

        $data = $this->request->getVar();
        $this->DoaModel->save($data);
        return redirect()->to('/doa')->with('success', 'Data hafalan doa santri ' . '<code>' . $names[0]['name_santri'] . '</code>' . ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'edit' => $this->DoaModel->where('doa_id', $id)->first(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            // 'penguji'   => $this->PengujiModel->getAll(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        if (empty($data['edit'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf data tidak ditemukan');
        }
        return view('admin/doa/editDoa', $data);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'santri_id' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Nama santri wajib diisi',
                ]
            ],
            'tglLulus'  => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Tanggal ujian wajib diisi',
                ],
            ],
            'predikat'  => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Hasil predikat santri wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $idSantri = $this->request->getVar('santri_id');
        $nameSantri = $this->SantriModel->getName($idSantri);
        // dd($nameSantri[0]['name_santri']);

        $data = $this->request->getVar();
        $this->DoaModel->update($id, $data);
        return redirect()->to('/doa')->with('success', 'Hafalan doa santri ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' berhasil di update');
    }

    public function delete($id = null)
    {
        $idname = $this->DoaModel->getAllDoa($id);
        // dd($idname[0]['name_santri']);
        $this->DoaModel->delete($id);
        return redirect()->to('/doa')->with('error', 'Data hafalan doa santri ' . '<code>' . $idname[0]['name_santri'] . '</code>' . ' berhasil dihapus');
    }

    public function cetak($id = null)
    {
        $data = [
            'Doa' => $this->DoaModel->getAllDoa($id),
        ];
        // dd($data);

        if (empty($data['Doa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf data sertifikat tidak ditemukan');
        }

        $nameSantri = $data['Doa'][0]['name_santri'];
        $tglUjian = $data['Doa'][0]['tglLulus'];
        $predikat = $data['Doa'][0]['predikat'];


        $serti = new Fpdi();
        $serti->AddFont('courierbi');
        $serti->setSourceFile("serti/do'a.pdf");

        $import = $serti->importPage(1);

        $size = $serti->getTemplateSize($import);
        // add a page
        $serti->AddPage($size['orientation'], array($size['width'], $size['height']));

        // use the imported page and place it at point 10,10 with a width of 100 mm
        $serti->useTemplate($import);

        $serti->SetFont('courierbi', '', '35');
        $serti->SetTextColor(0, 0, 0, 0);
        $serti->SetXY(100, 78, 100, 100);

        // cetak name santri
        $pos = 10;
        $serti->SetX(11.5);
        $serti->Cell(0, $pos, ucwords($nameSantri), 0, 0, 'C');

        // cetak name predikat
        $pos = 75;
        $serti->SetX(11.5);
        $serti->SetFont('Times', '', '30');
        $serti->Cell(0, $pos, ucwords($predikat), 0, 0, 'C');

        // cetak name tgl ujian
        $pos = 75;
        // $serti->SetX(11.5, 100);
        $serti->SetXY(88, 93, 0, 0);
        $serti->SetFont('Times', '', '20');
        $serti->Cell(0, $pos, date($tglUjian), 0, 0,);

        // lokasi simpan dimana
        return $serti->Output()->move('img');
        // return $serti->Output()->to()->move('img');
    }

    public function hafalanDoa($id = null)
    {
        $data = [
            'mdoa' => $this->MdoaModel->getJoinMdoa($id),
        ];
        // dd($data);

        if (empty($data['mdoa'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/doa/groupDoa', $data);
    }
}
