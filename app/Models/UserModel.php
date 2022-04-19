<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\TextUI\XmlConfiguration\UpdateSchemaLocationTo93;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['oauth_id', 'nameUser', 'emailUser', 'isactive', 'phoneUser', 'picture', 'password', 'roleUser', 'agent', 'browser', 'mobile', 'platform'];

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


    public function isAlreadyRegister($id = null)
    {
        // return $this->db->table('users')->getWhere(['user_id' => $id])
        //     ->getRowArray() > 0 ? true : false;

        $builder = $this->builder();
        $builder->where('oauth_id', $id);
        if ($builder->countAllResults() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserData($data, $id)
    {
        $builder = $this->builder();
        $builder->where('oauth_id', $id);
        $builder->update($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function getUser($userId = false)
    {
        // jika tidak ada id user
        if ($userId == false) {
            return $this->findAll();
        }

        // jika ada id user
        return $this->where(['user_id' => $userId])->first();
    }

    public function loginProses($pos)
    {
        $builder = $this->db->table('users');
        $builder->where('emailUser', $pos);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPaginate($num, $keyword = null)
    {
        // num mengambil angka dari paginate
        $builder = $this->builder();
        $builder->orderBy('roleUser', 'asc');

        // jika keyword tidak kosong
        if ($keyword != null) {
            $builder->like('nameUser', $keyword);
            $builder->orLike('emailUser', $keyword);
            $builder->orLike('roleUser', $keyword);
            $builder->orLike('isactive', $keyword);
        }

        return [
            'user' => $this->paginate($num),
            'pager' => $this->pager,
        ];
    }

    public function updateActived($id = null)
    {
        $builder = $this->builder();
        $builder->set('isactive', 'nonActived');
        $builder->where('user_id', $id);
        $builder->update();
        // $query = $builder->get();
        // return $query->getResultArray();
    }

    public function updatenonActived($id = null)
    {
        $builder = $this->builder();
        $builder->set('isactive', 'actived');
        $builder->where('user_id', $id);
        $builder->update();
    }
}
