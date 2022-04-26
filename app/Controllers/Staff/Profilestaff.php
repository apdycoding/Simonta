<?php

namespace App\Controllers\Staff;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Profilestaff extends ResourceController
{

    function __construct()
    {
        $this->UserModel = new UserModel();

        if (session()->roleUser != 'staff') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Maaf page tidak ditemukan di page staff');
        }
    }

    public function index()
    {
        return view('staff/profile/profileStaff');
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
    public function new($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'users' => session()->nameUser,
            // 'users' => $this->UserModel->where('user_id', $id)->first(),
        ];
        // dd($data);
        return view('staff/profile/changePass', $data);
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
        // dd($id);
        if (!$this->validate([
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                ]
            ],
            'passconf' => [
                'rules' => 'required|matches[password]',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nameUser' => $this->request->getVar('nameUser'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ];
        // dd($data);
        $this->UserModel->update($id, $data);
        return redirect()->to('/staff/Profilestaff')->with('success', 'Password user ' . '<code>' . $this->request->getVar('nameUser') . '</code>' . ' berhasil diubah');
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
