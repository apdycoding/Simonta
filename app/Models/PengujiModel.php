<?php

namespace App\Models;

use CodeIgniter\Model;

class PengujiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penguji';
    protected $primaryKey       = 'penguji_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_penguji', 'jk'];

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
        // jika id kosong maka tampilkan semua data
        if ($id == null) {
            return $this->orderBy('nama_penguji', 'asc')->findAll();
        }

        // jika ada id untul edit
        return $this->where('penguji_id', $id)->first();
    }

    public function delPenguji($id)
    {
        return $this->delete($id);
    }

    // public function joinPenguji()
    // {
    //     $builder = $this->db->table('penguji');
    //     $builder->join('surah', 'surah.penguji_id = penguji.penguji_id');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }
}
