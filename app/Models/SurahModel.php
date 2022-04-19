<?php

namespace App\Models;

use CodeIgniter\Model;

class SurahModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surah';
    protected $primaryKey       = 'surah_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_anak', 'nama_surah', 'surah_ke', 'tgl_ujian', 'predikat', 'penguji_id', 'santri_id'];

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
        $builder = $this->db->table('surah');
        $builder->join('santri', 'santri.santri_id = surah.santri_id');
        $builder->join('penguji', 'penguji.penguji_id = surah.penguji_id');
        if ($id != null) {
            $builder->where('surah_id', $id);
        }
        $builder->orderBy('name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function group($id = null)
    {
        $builder = $this->db->table('surah');
        $builder->join('santri', 'santri.santri_id = surah.santri_id');
        $builder->select('surah.*, santri.name_santri, count(*)');
        $builder->groupBy('surah.santri_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getGroup($id = null)
    {
        // dd($id);
        $builder = $this->db->table('surah');
        $builder->join('santri', 'santri.santri_id = surah.santri_id');
        $builder->join('penguji', 'penguji.penguji_id = surah.penguji_id');
        $builder->select('santri.name_santri, surah.*, Penguji.*');
        $builder->where('surah.santri_id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getSurah($id = null)
    {
        // return $this->where(['surah_id' => $id])->find();
        $builder = $this->db->table('surah');
        $builder->join('santri', 'santri.santri_id = surah.santri_id');
        // $builder->join('penguji', 'penguji.penguji_id = surah.penguji_id');
        $builder->select('santri.name_santri, nama_surah');
        $builder->where('surah.santri_id', $id);
        $query = $builder->get();

        return $query->getResultArray();
    }


    // report surah

    public function getPaginateSurah($num, $keyword = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = surah.santri_id ');
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

    // model dari view report surah
    public function dataSama($id = null)
    {
        $query = $this->builder();
        // $query->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $query->join('santri', 'santri.santri_id = surah.santri_id ');
        $query->select('surah.*, santri.name_santri, santri.santri_id');
        // tampilkan 3 data terakhir dan limit 3
        $query->orderBy('surah_id', 'desc');
        $query->limit('3');
        $query->where('santri.santri_id', $id);
        return $query->get();
    }


    // model cetak sertifikat
    public function getCetak($id = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = surah.santri_id ');
        $builder->where('santri.santri_id', $id);
        $builder->select('santri.name_santri, santri.santri_id');
        $builder->distinct();
        $result = $builder->get();
        return $result->getResultArray();
    }

    public function dataSama2($id = null)
    {
        $query = $this->builder();
        // $query->join('dhadits', 'dhadits.dhadits_id = mhadits.dhadits_id');
        $query->join('santri', 'santri.santri_id = surah.santri_id ');
        $query->orderBy('surah_id', 'desc');
        $query->limit('3');
        $query->select('surah.*, santri.name_santri, santri.santri_id');
        $query->where('santri.santri_id', $id);
        $result = $query->get()->getResultArray();
        return $result;
    }

    public function cetak($id = null)
    {
        $builder = $this->builder();
        $builder->join('santri', 'santri.santri_id = surah.santri_id');
        $builder->where('santri.santri_id', $id);
        $builder->select('santri.name_santri, santri.name_santri, surah.*');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
