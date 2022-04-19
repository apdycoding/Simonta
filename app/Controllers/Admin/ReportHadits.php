<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\MhaditsModel;

class ReportHadits extends ResourceController
{
    function __construct()
    {
        $this->MhaditsModel = new MhaditsModel();

        if (session()->get('roleUser') != "adminsuper") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->MhaditsModel->getPaginate(3, $keyword);
        // $data['data'] = $this->MhaditsModel->tampil_data();
        // dd($data);
        return view('admin/report/rhadits/indexData', $data);
    }

    public function indexs()
    {
        $data = [
            'mhadits' => $this->MhaditsModel->groupHadits(),
            'tes' => $this->MhaditsModel->getjoinsantri(),

            // tes
            // 'mhadits' => $this->MhaditsModel->reportcount(),
        ];
        // dd($data);

        // $query = $this->db = \Config\Database::connect();
        // $del = $query->table('mhadits')
        //     // ->selectSum('santri_id')
        //     ->get();
        // $data = $del->getResultArray();
        // dd($data);
        return view('admin/report/rhadits/indexData', $data);
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
