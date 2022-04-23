<?php

namespace App\Controllers\Staff;

use App\Models\DdoaModel;
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

        if (session()->get('roleUser') != "staff") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        // $data['penguji'] = $this->PengujiModel->getAll();
        $data['surah'] = $this->surahModel->group();
        // dd($data);
        return view('staff/Mastersurah/index', $data);
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

        return view('staff/Mastersurah/groups', $data);
    }

    public function Eserti($id = null)
    {
        $data = [
            'surah' => $this->surahModel->getAll($id),
            // 'edit'  => $this->surahModel->where('surah_id', $id)->first(),
            'edit' => $this->surahModel->getSurah($id),
        ];
        // dd($data);

        // foreach ($data['edit'] as $value) {
        //     echo "ads <br>";
        // }

        $name_santri    = ucwords($data['surah'][0]['name_santri']);
        $predikat       = ucwords($data['surah'][0]['predikat']);
        $surah          = ucwords($data['surah'][0]['nama_surah']);
        $tglUjian       = $data['surah'][0]['tgl_ujian'];


        // initiate FPDI
        $pdf = new Fpdi;
        // set the source file
        $pdf->AddFont('courierbi');
        $pdf->setSourceFile("serti/surat.pdf");


        // $font = $pdf->SetFont('Times', 16);


        // import page 1
        $tplIdx = $pdf->importPage(1);
        $size = $pdf->getTemplateSize($tplIdx);
        // add a page
        $pdf->AddPage($size['orientation'], array($size['width'], $size['height']));
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx);

        $pdf->SetFont('courierbi', '', '33');
        $pdf->SetTextColor(0, 0, 0, 0);
        $pdf->SetXY(100, 78, 100, 100);

        // cetak name santri
        $pos = 10;
        $pdf->SetX(11.5);
        $pdf->Cell(0, $pos, ucwords($name_santri), 0, 0, 'C');

        // cetak name predikat
        $pos = 75;
        $pdf->SetX(11.5);
        $pdf->SetFont('Times', '', '27');
        $pdf->Cell(0, $pos, ucwords($predikat), 0, 0, 'C');

        // cetak name tgl ujian
        $pos = 75;
        // $pdf->SetX(11.5, 100);
        $pdf->SetXY(88, 92, 0, 0);
        $pdf->SetFont('Times', '', '20');
        $pdf->Cell(0, $pos, date($tglUjian), 0, 0,);

        // cetak name surat ujian
        $pos = 75;
        // $pdf->SetX(11.5, 100);
        $pdf->SetXY(197, 60, 0, 0);
        $pdf->SetFont('Times', '', '27');
        $pdf->Cell(0, $pos, ucwords($surah), 0, 0,);

        // lokasi simpan dimana
        return $pdf->Output()->to()->move('img');
    }

    public function details($id = null)
    {
        $idSurah['surah'] = $this->surahModel->getAll($id);
        // dd($idSurah);
        if (empty($idSurah['surah'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // dd($idSurah);
        return view('staff/Mastersurah/showDetail', $idSurah);
    }

    public function new()
    {
        $data = [
            'names'     => $this->SantriModel->showName(),
            'validation'    => \Config\Services::validation(),
            'penguji'      => $this->PengujiModel->getAll(),
        ];
        // dd($data);
        return view('staff/Mastersurah/newSurah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // validation untuk input data
        if (!$this->validate([
            'santri_id' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama santri Wajib diisi di masukkan',
                ]
            ],
            'nama_surah' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama surah Wajib diisi',
                ]
            ],
            'surah_ke' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'  => 'Nomor urut surah wajid dimasukkan',
                    'integer'  => 'Inputan harus berupa angka',
                ]
            ],
            'tgl_ujian' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Tanggal ujian wajid dimasukkan',
                ]
            ],
            'predikat' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Predikat ujian wajid dimasukkan',
                ]
            ],
            'penguji_id' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Penguji wajid dimasukkan',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $idSantri = $this->request->getVar('santri_id');
        $nameSantri = $this->SantriModel->getName($idSantri);
        // dd($nameSantri[0]['name_santri']);
        $data = $this->request->getVar();
        // dd($data);
        $this->surahModel->save($data);
        return redirect()->to('/staff/Mastersurah')->with('success', 'Data hafalan santri ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' dan surah ' . '<code>' . $this->request->getVar('nama_surah') . '</code>' .  ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->showName(),
            'edit'  => $this->surahModel->where('surah_id', $id)->first(),
            'penguji'   => $this->PengujiModel->getAll(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        if (empty($data['edit'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('staff/Mastersurah/editSurah', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // validation untuk input data
        if (!$this->validate([
            'santri_id' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama santri Wajib diisi di masukkan',
                ]
            ],
            'nama_surah' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Nama surah Wajib diisi',
                ]
            ],
            'surah_ke' => [
                'rules'     => 'required|integer',
                'errors'    => [
                    'required'  => 'Nomor urut surah wajid dimasukkan',
                    'integer'  => 'Inputan harus berupa angka',
                ]
            ],
            'tgl_ujian' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Tanggal ujian wajid dimasukkan',
                ]
            ],
            'predikat' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Predikat ujian wajid dimasukkan',
                ]
            ],
            'penguji_id' => [
                'rules'     => 'required',
                'errors'    => [
                    'required'  => 'Penguji wajid dimasukkan',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $idSantri = $this->request->getVar('santri_id');
        $nameSantri = $this->SantriModel->getName($idSantri);
        // dd($nameSantri);

        $data = $this->request->getVar();
        $this->surahModel->update($id, $data);
        return redirect()->to('/staff/Mastersurah')->with('success', 'Data surah ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' dan surah ' . '<code>' . $this->request->getVar('nama_surah') . '</code>' . ' berhasil di update');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $getName = $this->surahModel->getAll($id);
        // dd($getName[0]['name_santri']);
        $this->surahModel->delete($id);
        return redirect()->to('/staff/Mastersurah')->with('error', 'Data hafalan santri ' . '<code>' . $getName[0]['name_santri'] . '</code>' . ' berhasil dihapus');
    }
}
