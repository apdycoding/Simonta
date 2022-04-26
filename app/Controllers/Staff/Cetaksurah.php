<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use setasign\Fpdi\Fpdi;

class Cetaksurah extends ResourceController
{
    // Create a shared instance of the model
    protected $modelName = 'App\Models\Surahmodel';

    function __construct()
    {
        if (session()->get('roleUser') != "staff") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->model->getPaginateSurah(3, $keyword);
        // $data['data'] = $this->MhaditsModel->tampil_data();
        // dd($data);
        return view('staff/cetaksurah/reportSurah', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $nama =  $this->model->getCetak($id);
        $id = $nama[0]['santri_id'];
        // dd($id);

        // cetak nama hadits 3 data terakhir
        $namaSurah = $this->model->dataSama2($id);
        // dd($namaSurah);
        // ini untuk cetak predikat dan tgl
        $data =  $this->model->cetak($id);
        // dd($data);


        // dd($nama);
        // dd($data[0]['name_santri']);

        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf data sertifikat tidak ditemukan');
        }

        $nameSantri = $nama[0]['name_santri'];
        // dd($nameSantri);
        $tglUjian = $data[0]['tgl_ujian'];
        // dd($tglUjian);
        $predikat = $data[0]['predikat'];


        $serti = new Fpdi();
        $serti->AddFont('courierbi');
        $serti->setSourceFile("serti/surat.pdf");

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

        // cetak nama hadits 1
        $pos = 5;
        $serti->SetFont('courierbi', '', '12');
        $serti->SetTextColor(100, 10, 10);
        $serti->SetX(210);
        foreach ($namaSurah as $dt) {
            $array[] = $dt;
            // $array[] = [
            //     '1' => $dt,
            //     '2' => $dt,
            //     '3' => $dt,
            // ];
        }
        // dd($array);
        $serti->Cell(100, $pos, '*' . $array['0']['nama_surah'], 0, 0);

        // nama hadits 2
        $pos = 2;
        $serti->SetFont('courierbi', '', '12');
        $serti->SetX(210);
        $serti->Cell(0, 12, '*' . $array['1']['nama_surah'], 190, 0);

        // nama hadits 3
        $pos = 20;
        $serti->SetFont('courierbi', '', '12');
        $serti->SetX(210);
        $serti->Cell(0, $pos, '*' . $array['2']['nama_surah'], 0, 0);

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
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
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
