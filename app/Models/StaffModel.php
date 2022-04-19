<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'staff';
    protected $primaryKey       = 'staff_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik_staff', 'name_staff', 'gender', 'agama', 'alamat', 'tgl_lahir', 'tempat_lhr', 'phone_staff'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getPaginateStaff($num, $keyword = null)
    {
        // num mengambil angka dari paginate
        $builder = $this->builder();
        $builder->orderBy('name_staff', 'asc');

        // jika keyword tidak kosong
        if ($keyword != null) {
            $builder->like('nik_staff', $keyword);
            $builder->orLike('name_staff', $keyword);
            $builder->orLike('gender', $keyword);
            $builder->orLike('alamat', $keyword);
            $builder->orLike('tgl_lahir', $keyword);
            $builder->orLike('tempat_lhr', $keyword);
            $builder->orLike('phone_Staff', $keyword);
        }

        return [
            'staff' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
