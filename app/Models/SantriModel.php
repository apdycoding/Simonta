<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'santri';
    protected $primaryKey       = 'santri_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nik_santri', 'name_santri', 'gender', 'agama', 'alamat', 'tgl_lahir', 'tempat_lhr', 'photos', 'statusSantri', 'nik_ibu', 'nama_ibu', 'pekerjaan_ibu', 'status_ibu', 'phoneIbu', 'nik_ayah', 'nama_ayah', 'pekerjaan_ayah', 'status_ayah', 'phoneAyah'];

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

    public function getSantri($santriId = false)
    {
        // jika slug kosong tampilkan semua
        if ($santriId == false) {
            return $this->where('statusSantri', '1')
                ->orderBy('name_santri', 'asc')
                ->findAll();
        }

        // jika ada slug tampilkan yang dibawah
        return $this->where(['santri_id' => $santriId])->first();
    }

    public function inActive()
    {
        return $this->where('statusSantri', '0')
            ->orderBy('name_santri', 'asc')->findAll();
    }

    public function getName($id = null)
    {
        $builder = $this->db->table('santri');
        $builder->select('santri_id, name_santri');

        // jika ada idnya
        if ($id != null) {
            $builder->where('santri_id', $id);
        }

        $builder->where('statusSantri', '1');
        $builder->orderBy('name_santri', 'asc');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function showName($id = null)
    {
        // id untuk update 
        // if ($id != null) {
        //     return $this->where('santri_id', $id)->first();
        // }
        // jika tidak ada id
        return $this->where('statusSantri', '1')->findAll();
    }

    // total santri 
    // countAll menghitung seluruh baris 
    // dan countAllResult untuk menghitung berdasarkan baris where
    public function SantriInActive()
    {
        $builder = $this->builder();
        $builder->like('statusSantri', '0');
        $query = $builder->countAllResults();
        return $query;
    }

    public function SantriActive()
    {
        $builder = $this->builder();
        $builder->like('statusSantri', '1');
        $query = $builder->countAllResults();
        return $query;
    }

    public function mhadits($id = null)
    {
        $builder = $this->builder();
        $builder->join('mhadits', 'mhadits.santri_id = santri.santri_id');
        if ($id != null) {
            $builder->where('mhadits.santri_id', $id);
        }
        $builder->select('santri.santri_id,  mhadits.*');
        $return = $builder->get();
        return $return->getResultArray();
    }

    public function doa($id = null)
    {
        $builder = $this->builder();
        $builder->join('doa', 'doa.santri_id = santri.santri_id');
        if ($id != null) {
            $builder->where('doa.santri_id', $id);
        }
        $builder->select('santri.santri_id, doa.*');
        $return = $builder->get();
        return $return->getResultArray();
    }

    public function hadits($id = null)
    {
        $builder = $this->builder();
        $builder->join('hadits', 'hadits.santri_id = santri.santri_id');
        // $builder->join('mdoa', 'mdoa.santri_id = santri.santri_id');
        // $builder->join('surah', 'surah.santri_id = santri.santri_id');
        if ($id != null) {
            $builder->where('hadits.santri_id', $id);
        }
        $builder->select('santri.santri_id, hadits.*');
        $return = $builder->get();
        return $return->getResultArray();
    }

    public function mdoa($id = null)
    {
        $builder = $this->builder();
        $builder->join('mdoa', 'mdoa.santri_id = santri.santri_id');
        // $builder->join('surah', 'surah.santri_id = santri.santri_id');
        if ($id != null) {
            $builder->where('mdoa.santri_id', $id);
        }
        $builder->select('santri.santri_id, mdoa.*');
        $return = $builder->get();
        return $return->getResultArray();
    }

    public function surah($id = null)
    {
        $builder = $this->builder();
        $builder->join('surah', 'surah.santri_id = santri.santri_id');
        if ($id != null) {
            $builder->where('surah.santri_id', $id);
        }
        $builder->select('santri.santri_id, surah.*');
        $return = $builder->get();
        return $return->getResultArray();
    }
}
