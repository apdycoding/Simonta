<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StaffModel;

class Staff extends ResourceController
{

    function __construct()
    {
        if (session()->get('roleUser') != "adminsuper") {
            return throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf halaman tidak ditemukan');
            // return redirect()->to('/');
            exit;
        }
        $this->StaffModel = new StaffModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->StaffModel->getPaginateStaff(3, $keyword);

        // dd($data);
        return view('admin/staff/indexStaff', $data);
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


    public function new()
    {
        return view('admin/staff/addStaff');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = $this->request->getVar();
        $this->StaffModel->save($data);
        return redirect()->to('/staff')->with('succes', 'Data Staff ' . '<code>' . $this->request->getVar('name_staff') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'edit' => $this->StaffModel->where('staff_id', $id)->first(),
        ];
        if (empty($data['edit'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('admin/staff/editStaff', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $data = $this->request->getVar();
        $this->StaffModel->update($id, $data);
        return redirect()->to('/staff')->with('warning', 'Data Staff ' . '<code>' . $this->request->getVar('name_staff') . '</code>' . ' berhasil diubah');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $data = $this->StaffModel->where('staff_id', $id)->first();
        // dd($data['name_staff']);
        $this->StaffModel->delete($id);
        return redirect()->to('/staff')->with('error', 'Data staff ' . '<code>' . $data['name_staff'] . '</code>' . ' berhasil di hapus');
    }
}
