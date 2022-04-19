<?php

namespace App\Models;

use CodeIgniter\Model;

class KepsekModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kepsek';
    protected $primaryKey       = 'kepsek_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik_kepsek', 'name_kepsek', 'gender', 'alamat', 'tgl_lahir', 'tempat_lhr', 'status_kepsek', 'gelar', 'lulusan', 'phone_kepsek'];

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

    public function getPaginateKepsek($num, $keyword = null)
    {
        // num mengambil angka dari paginate
        $builder = $this->builder();
        $builder->orderBy('name_kepsek', 'asc');

        // jika keyword tidak kosong
        if ($keyword != null) {
            $builder->like('nik_kepsek', $keyword);
            $builder->orLike('name_kepsek', $keyword);
            $builder->orLike('gender', $keyword);
            $builder->orLike('alamat', $keyword);
            $builder->orLike('tgl_lahir', $keyword);
            $builder->orLike('tempat_lhr', $keyword);
            $builder->orLike('status_kepsek', $keyword);
            $builder->orLike('gelar', $keyword);
            $builder->orLike('lulusan', $keyword);
            $builder->orLike('phone_kepsek', $keyword);
        }

        return [
            'kepsek' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }
}
