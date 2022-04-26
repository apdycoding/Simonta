<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\HaditsModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;
use App\Models\MhaditsModel;
use setasign\Fpdi\Fpdi;

class Cetakhadits extends ResourceController
{
    function __construct()
    {
        $this->PengujiModel = new PengujiModel();
        $this->HaditsModel = new HaditsModel();
        $this->SantriModel = new SantriModel();
        $this->MhaditsModel = new MhaditsModel();

        if (session()->get('roleUser') != "staff") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman staff tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $data['hadits'] = $this->HaditsModel->getAll();
        // dd($data);
        // return view('admin/hadits/indexHadits', $data);
        return view('staff/cetakhadits/groupHadits', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'mhadits' => $this->MhaditsModel->getjoinsantri($id),
        ];
        // dd($data);
        if (empty($data['mhadits'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('staff/Cetakhadits/groupDataHadits', $data);
    }

    public function print($id = null)
    {
        $data = [
            'hadits' => $this->HaditsModel->getAll($id),
        ];
        // dd($data);

        if (empty($data['hadits'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf data sertifikat tidak ditemukan');
        }

        $nameSantri = $data['hadits'][0]['name_santri'];
        $tglUjian = $data['hadits'][0]['tglLulus'];
        $predikat = $data['hadits'][0]['predikat'];

        $serti = new Fpdi();
        $serti->AddFont('courierbi');
        $serti->setSourceFile("serti/hadits.pdf");

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
        return $serti->Output()->to()->move('img');
    }

    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'names'      => $this->SantriModel->showName(),
            // 'penguji'    => $this->PengujiModel->getAll(),
        ];
        return view('staff/Cetakhadits/newHadits', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
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
        // dd($nameSantri['names'][0]['name_santri']);

        $data = $this->request->getVar();
        $this->HaditsModel->save($data);
        return redirect()->to('/staff/Cetakhadits')->with('success', 'Data hafalan ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' santri berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'edit' => $this->HaditsModel->where('hadits_id', $id)->first(),
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            // 'penguji'   => $this->PengujiModel->getAll(),
            'validation' => \Config\Services::validation(),
        ];
        if (empty($data['edit'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf data tidak ditemukan');
        }

        return view('staff/Cetakhadits/editHadits', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
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

        $data = $this->request->getVar();
        $this->HaditsModel->update($id, $data);
        return redirect()->to('/staff/Cetakhadits')->with('success', 'Data santri ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' berhasil di update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $idname = $this->HaditsModel->getAll($id);
        $this->HaditsModel->delete($id);
        return redirect()->to('/staff/Cetakhadits')->with('error', 'Data hafalan santri ' . '<code>' . $idname[0]['name_santri'] . '</code>' . ' berhasil dihapus');
    }
}
