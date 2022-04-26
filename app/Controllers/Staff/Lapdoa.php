<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MdoaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lapdoa extends ResourceController
{
    function __construct()
    {
        $this->MdoaModel = new MdoaModel();

        if (session()->get('roleUser') != "staff") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->MdoaModel->getPaginate(3, $keyword);
        // $data['data'] = $this->MhaditsModel->tampil_data();
        // dd($data);
        return view('staff/rdoa/indexDoa', $data);
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
        $data = $this->MdoaModel->getJoinMdoa();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('B2:G2');
        $sheet->setCellValue('B2', 'Laporan Hafalan Doa Santri');
        $sheet->getStyle('B2')->getFont()->setSize(20);
        $sheet->getStyle('B2')->getFont()->setBold(true);

        $sheet->getStyle('B2:G2')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFF00');
        $sheet->getStyle('B2:G2')->getAlignment()->setHorizontal('center');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];

        $sheet->getStyle('B2:G2')->applyFromArray($styleArray);

        $sheet->getMergeCells('B4:G4');
        $sheet->setCellValue('B4', 'No');
        $sheet->setCellValue('C4', 'Nama Santri');
        $sheet->setCellValue('D4', 'Nama doa');
        $sheet->setCellValue('E4', 'Predikat');
        $sheet->setCellValue('F4', 'Penguji');
        $sheet->setCellValue('G4', 'Tanggal Ujian');

        $coloum = 5;
        foreach ($data as $key => $value) {
            $sheet->setCellValue('B' . $coloum, ($coloum - 4));
            $sheet->setCellValue('C' . $coloum, $value['name_santri']);
            $sheet->setCellValue('D' . $coloum, $value['nama_doa']);
            $sheet->setCellValue('E' . $coloum, $value['predikat']);
            $sheet->setCellValue('F' . $coloum, $value['nama_penguji']);
            $sheet->setCellValue('G' . $coloum, $value['dtgl_ujian']);
            $coloum++;
        }

        $sheet->getStyle('B4:G4')->getFont()->setBold(true);
        $sheet->getStyle('B4:G4')->getFill()
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

        $sheet->getStyle('B4:G' . ($coloum - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
        header('Content-Disposition: attachment;filename=Lapdoa.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
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
