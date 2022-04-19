<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use setasign\Fpdi\Tfpdf\FpdfTpl;

class Users extends ResourceController
{

    function __construct()
    {
        $this->UserModel = new UserModel();

        if (session()->get('roleUser') != "adminsuper") {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('maaf halaman tidak ditemukan');
            exit;
        }
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $data = $this->UserModel->getPaginate(5, $keyword);
        // $data['keyword'] = $keyword;
        return view('admin/user/index', $data);
    }

    // detail
    public function show($id = null)
    {
        //
    }


    public function new()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/user/newUser', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'nameUser' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Name user wajib diisi'
                ]
            ],
            'emailUser' => [
                'rules' => 'required|valid_emails|valid_email|is_unique[users.emailUser]',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                    'is_unique'  => 'Email sudah terdaftar di databases',
                    'valid_emails' => 'Please check the Email field. It does not appear to be valid.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                ]
            ],
            'phoneUser' => [
                'rules' => 'required|integer',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                    'integer' => 'inputan harus berupa angka',
                ]
            ],
            'roleUser' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                ]
            ],
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
            'emailUser' => $this->request->getVar('emailUser'),
            'phoneUser' => $this->request->getVar('phoneUser'),
            'roleUser' => $this->request->getVar('roleUser'),
            'isactive' => 'nonActived',
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ];
        $this->UserModel->save($data);
        return redirect()->to('/users')->with('success', 'User baru ' . '<code>' . $this->request->getVar('nameUser') . '</code>' . ' berhasil disimpan');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'users' => $this->UserModel->where('user_id', $id)->first(),
        ];
        // dd($data);
        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        return view('admin/user/editUser', $data);
    }

    public function update($id = null)
    {
        // dd($id);
        if (!$this->validate([
            'nameUser' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Name user wajib diisi'
                ]
            ],
            'emailUser' => [
                // 'rules' => 'required|valid_emails|valid_email|is_unique[users.emailUser]',
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                    'is_unique'  => 'Email sudah terdaftar di databases',
                    'valid_emails' => 'Please check the Email field. It does not appear to be valid.',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                ]
            ],
            'phoneUser' => [
                'rules' => 'required|integer',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                    'integer' => 'inputan harus berupa angka',
                ]
            ],
            'roleUser' => [
                'rules' => 'required',
                'errors'    => [
                    'required'  => 'Email user wajib diisi',
                ]
            ],
            // 'password' => [
            //     'rules' => 'required|min_length[5]',
            //     'errors'    => [
            //         'required'  => 'Email user wajib diisi',
            //     ]
            // ],
            // 'passconf' => [
            //     'rules' => 'required|matches[password]',
            //     'errors'    => [
            //         'required'  => 'Email user wajib diisi',
            //     ]
            // ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'nameUser' => $this->request->getVar('nameUser'),
            'emailUser' => $this->request->getVar('emailUser'),
            'phoneUser' => $this->request->getVar('phoneUser'),
            'roleUser' => $this->request->getVar('roleUser'),
            // 'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        ];
        // dd($data);
        $this->UserModel->update($id, $data);
        return redirect()->to('/users')->with('succes', 'Data user ' . '<code>' . $this->request->getVar('nameUser') . '</code>' . ' berhasil disimpan');
    }

    public function delete($id = null)
    {
        $nameUser = $this->UserModel->where('user_id', $id)->first();
        // dd($nameUser['nameUser']);
        $this->UserModel->delete($id);
        return redirect()->to('/users')->with('error', 'Data user ' . '<code>' . $nameUser['nameUser'] . '</code>' . ' berhasil di simpan');
    }

    public function status($id = null)
    {
        // where berdasarkan id
        $status = $this->UserModel->find($id);

        // jika tidak sama dengan nonActived
        if ($status['isactive'] != 'nonActived') {
            // maka true
            $this->UserModel->updateActived($id);
        } else {
            // maka false
            $this->UserModel->updatenonActived($id);
        }

        return redirect()->to('users')->with('succes', 'Status santri ' . '<code>' . $status['nameUser'] . '</code>' . ' berubah menjadi ' . '<code>' . $status['isactive'] . '</code>');
    }

    public function changePass($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'users' => $this->UserModel->where('user_id', $id)->first(),
        ];
        return view('admin/user/changePass', $data);
    }

    public function prosesChange($id = null)
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
        return redirect()->to('/users')->with('succes', 'Password user ' . '<code>' . $this->request->getVar('nameUser') . '</code>' . ' berhasil diubah');
    }
}
