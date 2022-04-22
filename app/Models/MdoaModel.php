<?php

namespace App\Models;

use CodeIgniter\Model;

class MdoaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mdoa';
    protected $primaryKey       = 'mdoa_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['santri_id', 'ddoa_id', 'dtgl_ujian', 'predikat', 'penguji_id'];

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

    public function grupMdoa($id = null)
    {
        $builder = $this->builder();
        $builder->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id');
        $builder->join('santri', 'santri.santri_id = mdoa.santri_id ');
        $builder->join('penguji', 'penguji.penguji_id = mdoa.penguji_id ');
        $builder->select('mdoa.*,penguji.nama_penguji, ddoa.nama_doa, count(*), santri.name_santri');
        // group dan hitung jumlah berapa hafalan santri
        $builder->groupBy('mdoa.santri_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJoinMdoa($id = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = mdoa.santri_id ');
        $builder->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id ');
        $builder->join('penguji', 'penguji.penguji_id = mdoa.penguji_id ');

        if ($id != null) {
            $builder->where('santri.santri_id', $id);
        }

        $builder->select('mdoa.*,penguji.nama_penguji, santri.name_santri, ddoa.nama_doa');
        $builder->orderBy('santri.name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getJoinId($id = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = mdoa.santri_id ');
        $builder->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id ');
        $builder->join('penguji', 'penguji.penguji_id = mdoa.penguji_id ');

        if ($id != null) {
            $builder->where('mdoa.mdoa_id', $id);
        }

        $builder->select('mdoa.*,penguji.nama_penguji, santri.name_santri, ddoa.nama_doa');
        $builder->orderBy('santri.name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getDataNotIn($var = null)
    {
        $query = $this->db->query("SELECT * From ddoa where ddoa_id NOT IN 
        (select ddoa_id From mdoa WHERE santri_id = $var)");
        return $query->getResultArray();
    }

    public function joinDdoa($id = null)
    {

        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = mdoa.santri_id');
        $builder->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id');

        if ($id != null) {
            $builder->where('santri.santri_id', $id);
        }

        $builder->select('santri.*, ddoa.nama_doa');
        // $builder->orderBy('santri.name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function getPaginate($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id');
        $builder->join('santri', 'santri.santri_id = mdoa.santri_id ');
        $builder->select('santri.name_santri, santri.santri_id');
        $builder->distinct();

        // jika keyword tidak kosong
        if ($keyword != null) {
            $builder->like('santri.name_santri', $keyword);
            $builder->orLike('santri.santri_id', $keyword);
        }

        return [
            'data' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function dataSama($id = null)
    {
        // $query = $this->db = \Config\Database::connect();
        $query = $this->builder();
        // $query->table('mhadits');
        $query->join('ddoa', 'ddoa.ddoa_id = mdoa.ddoa_id');
        $query->join('santri', 'santri.santri_id = mdoa.santri_id ');
        $query->select('ddoa.*, santri.name_santri, santri.santri_id');
        $query->where('santri.santri_id', $id);
        return $query->get();
    }
}
