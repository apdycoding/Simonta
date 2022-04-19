<?php

namespace App\Models;

use CodeIgniter\Model;

class HaditsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hadits';
    protected $primaryKey       = 'hadits_id';
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

    public function getAll($id = null)
    {
        $builder = $this->db->table('hadits');
        $builder->join('santri', 'santri.santri_id = hadits.santri_id');
        // $builder->join('penguji', 'penguji.penguji_id = hadits.penguji_id');
        if ($id != null) {
            $builder->where('hadits_id', $id);
        }
        $builder->orderBy('santri.name_santri', 'asc');
        $builder->select('hadits.*, santri.name_santri');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function groupHadits()
    {
        $builder = $this->db->table('hadits');
        $builder->join('santri', 'santri.santri_id = hadits.santri_id');
        $builder->select('hadits.*, santri.name_santri, count(*)');
        $builder->groupBy('hadits.santri_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function idGroup($id = null)
    {
        // dd($id);
        $builder = $this->db->table('hadits');
        $builder->join('santri', 'santri.santri_id = hadits.santri_id');
        // $builder->join('penguji', 'penguji.penguji_id = hadits.penguji_id');
        $builder->select('santri.name_santri, hadits.*, Penguji.*');
        $builder->where('hadits.santri_id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }

    // function hitung data doa yang cetak sertifikat
    public function countH($id = null)
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }
}
