<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;
use Config\App;
use App\Models\SurahModel;
use App\Models\SantriModel;
use App\Models\PengujiModel;
use setasign\Fpdi\Fpdi;

class HafalanSurah extends ResourcePresenter
{

    // protected $surahModel;

    function __construct()
    {
        $this->surahModel = new SurahModel();
        $this->SantriModel = new SantriModel();
        $this->PengujiModel = new PengujiModel();

        if (session()->get('roleUser') != "adminsuper") {
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
        return view('admin/surah/index', $data);
    }

    public function show($id = null)
    {
        $idSurah['surah'] = $this->surahModel->getAll($id);
        // dd($idSurah);
        if (empty($idSurah['surah'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // dd($idSurah);
        return view('admin/surah/showDetail', $idSurah);
    }

    /**
     * Present a view to present a new single resource object
     *
     * @return mixed
     */
    public function new()
    {
        // $data['names'] = $this->SantriModel->getName();

        $data = [
            'names'     => $this->SantriModel->getName(),
            'validation'    => \Config\Services::validation(),
            'penguji'      => $this->PengujiModel->getAll(),
        ];
        // dd($data);
        return view('admin/surah/newSurah', $data);
    }


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
        return redirect()->to('/HafalanSurah')->with('success', 'Data hafalan santri ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' dan surah ' . '<code>' . $this->request->getVar('nama_surah') . '</code>' .  ' berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data = [
            'names' => $this->SantriModel->orderBy('name_santri', 'asc')->getName(),
            'edit'  => $this->surahModel->where('surah_id', $id)->first(),
            'penguji'   => $this->PengujiModel->getAll(),
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        if (empty($data['edit'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/surah/editSurah', $data);
    }

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
        return redirect()->to('/HafalanSurah')->with('success', 'Data surah ' . '<code>' . $nameSantri[0]['name_santri'] . '</code>' . ' dan surah ' . '<code>' . $this->request->getVar('nama_surah') . '</code>' . ' berhasil di update');
    }


    public function remove($id = null)
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

    public function delete($id = null)
    {
        $getName = $this->surahModel->getAll($id);
        // dd($getName[0]['name_santri']);
        $this->surahModel->delete($id);
        return redirect()->to('/Hafalansurah')->with('error', 'Data hafalan santri ' . '<code>' . $getName[0]['name_santri'] . '</code>' . ' berhasil dihapus');
    }
}
