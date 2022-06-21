<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use Google\Service\CloudSearch\Id;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\ExecutionOrderDependency;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class MhaditsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mhadits';
    protected $primaryKey       = 'Mhadits_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['santri_id', 'dhadits_id', 'htgl_ujian', 'predikat', 'penguji_id'];

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

    public function getjoinsantri($id = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = mhadits.santri_id ');
        $builder->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id ');
        $builder->join('penguji', 'penguji.penguji_id = mhadits.penguji_id ');

        if ($id != null) {
            $builder->where('santri.santri_id', $id);
        }

        $builder->select('penguji.nama_penguji,mhadits.*, santri.name_santri, dhadits.nama_hadits');
        $builder->orderBy('santri.name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // group hadits berdasarkan nama santri
    public function groupHadits($id = null)
    {
        $builder = $this->builder();
        $builder->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $builder->join('santri', 'santri.santri_id = mhadits.santri_id ');
        $builder->select('mhadits.*, dhadits.nama_hadits, count(*), santri.name_santri');
        // group dan hitung jumlah berapa hafalan santri
        $builder->groupBy('mhadits.santri_id');
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function search($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $builder->join('santri', 'santri.santri_id = mhadits.santri_id ');
        $builder->select('mhadits.*, dhadits.nama_hadits, count(*), santri.name_santri');
        // group dan hitung jumlah berapa hafalan santri
        $builder->groupBy('mhadits.santri_id');
        // $query = $builder->get();
        // return $query->getResultArray();
        // jika keyword tidak kosong
        if ($keyword != null) {
            $builder->like('name_santri', $keyword);
            // $builder->orLike('santri.santri_id', $keyword);
        }

        return [
            'mhadits' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    // untuk mengambil unique value
    public function tampil_data()
    {
        $builder = $this->builder();
        $builder->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $builder->join('santri', 'santri.santri_id = mhadits.santri_id ');
        $builder->select('santri.name_santri, santri.santri_id');
        $builder->distinct();
        $query = $builder->get();
        // return $query;
        return $query->getResultArray();
    }

    public function getPaginate($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $builder->join('santri', 'santri.santri_id = mhadits.santri_id ');
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
        $query->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $query->join('santri', 'santri.santri_id = mhadits.santri_id ');
        $query->select('dhadits.*, santri.name_santri, santri.santri_id');
        $query->where('santri.santri_id', $id);
        return $query->get();
    }

    public function getSantriHadits($id = null)
    {
        // menampilkan data yang tidak ada di tabel A dan B berdasarkan id
        // cara 1
        // $query = $this->db->query("SELECT * From dhadits where not exists 
        // (select * From mhadits where mhadits.dhadits_id = dhadits.dhadits_id and santri_id = 13)");

        // cara 2
        $query = $this->db->query("SELECT * From dhadits where dhadits_id NOT IN 
        (select dhadits_id From mhadits WHERE Mhadits_id = $id)");
        return $query->getResultArray();
    }

    public function getData($var = null)
    {
        $query = $this->db->query("SELECT * From dhadits where dhadits_id NOT IN 
        (select dhadits_id From mhadits WHERE santri_id = $var)");
        return $query->getResultArray();
    }


    // repot
    public function reportcount($var = null)
    {
        $builder = $this->builder();
        $builder->like('santri_id', '6');
        $query = $builder->countAllResults();
        return $query;
    }
}
