<?php

namespace App\Models;

use CodeIgniter\Model;

class DoaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'doa';
    protected $primaryKey       = 'doa_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tglLulus', 'predikat', 'santri_id'];

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

    public function getAllDoa($id = null)
    {
        $builder = $this->db->table('doa');
        $builder->join('santri', 'santri.santri_id = doa.santri_id');
        if ($id != null) {
            $builder->where('doa_id', $id);
        }
        $builder->orderBy('santri.name_santri', 'asc');
        $builder->select('doa.*, santri.name_santri');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function countdoa($var = null)
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }
}
