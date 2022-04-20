<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SantriModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ReportSantri extends ResourceController
{

    function __construct()
    {
        $this->santriModel = new SantriModel();

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

        return view('admin/report/rsantri/index', $data);
    }

    public function export($var = null)
    {
        $santri = $this->santriModel->getSantri();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('B2:S2');
        $sheet->setCellValue('B2', 'Rekap Data Santri Active');
        $sheet->getStyle('B2')->getFont()->setSize(20);
        $sheet->getStyle('B2')->getFont()->setBold(true);

        $sheet->getStyle('B2:S2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $sheet->getStyle('B2:S2')->getAlignment()->setHorizontal('center');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('B2:S2')->applyFromArray($styleArray);

        $sheet->getMergeCells('B4:S4');

        $sheet->setCellValue('B4', 'No');
        $sheet->setCellValue('C4', 'Nik Santri');
        $sheet->setCellValue('D4', 'Nama Santri');
        $sheet->setCellValue('E4', 'Gender');
        $sheet->setCellValue('F4', 'Agama');
        $sheet->setCellValue('G4', 'Alamat');
        $sheet->setCellValue('H4', 'Tanggal lahir');
        $sheet->setCellValue('I4', 'Tempat lahir');
        $sheet->setCellValue('J4', 'Nik Ibu');
        $sheet->setCellValue('K4', 'Nama Ibu');
        $sheet->setCellValue('L4', 'Pekerjaan Ibu');
        $sheet->setCellValue('M4', 'Status Ibu');
        $sheet->setCellValue('N4', 'Phone Ibu');
        $sheet->setCellValue('O4', 'Nik Ayah');
        $sheet->setCellValue('P4', 'Nama Ayah');
        $sheet->setCellValue('Q4', 'Pekerjaan Ayah');
        $sheet->setCellValue('R4', 'Status Ayah');
        $sheet->setCellValue('S4', 'Phone Ayah');

        $coloum = 5;
        foreach ($santri as $key => $value) {
            $sheet->setCellValue('B' . $coloum, ($coloum - 4));
            $sheet->setCellValue('C' . $coloum, $value['nik_santri']);
            $sheet->setCellValue('D' . $coloum, $value['name_santri']);
            $sheet->setCellValue('E' . $coloum, $value['gender']);
            $sheet->setCellValue('F' . $coloum, $value['agama']);
            $sheet->setCellValue('G' . $coloum, $value['alamat']);
            $sheet->setCellValue('H' . $coloum, $value['tgl_lahir']);
            $sheet->setCellValue('I' . $coloum, $value['tempat_lhr']);
            $sheet->setCellValue('J' . $coloum, $value['nik_ibu']);
            $sheet->setCellValue('K' . $coloum, $value['nama_ibu']);
            $sheet->setCellValue('L' . $coloum, $value['pekerjaan_ibu']);
            $sheet->setCellValue('M' . $coloum, $value['status_ibu']);
            $sheet->setCellValue('N' . $coloum, $value['phoneIbu']);
            $sheet->setCellValue('O' . $coloum, $value['nik_ayah']);
            $sheet->setCellValue('P' . $coloum, $value['nama_ayah']);
            $sheet->setCellValue('Q' . $coloum, $value['pekerjaan_ayah']);
            $sheet->setCellValue('R' . $coloum, $value['status_ayah']);
            $sheet->setCellValue('S' . $coloum, $value['phoneAyah']);
            $coloum++;
        }

        $sheet->getStyle('B4:S4')->getFont()->setBold(true);
        $sheet->getStyle('B4:S4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('B4:S' . ($coloum - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
        $sheet->getColumnDimension('Q')->setAutoSize(true);
        $sheet->getColumnDimension('R')->setAutoSize(true);
        $sheet->getColumnDimension('S')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
        header('Content-Disposition: attachment;filename=Lapsantri.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
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
