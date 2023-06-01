<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetHistoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'assethistory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'assetId',
        'action',
        'userId',
        'updatedAt',
        'createdAt',
    ];

    // Dates
    protected $useTimestamps = false;
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

    public function getUser($id = 0): array{
        $userModel = new UserModel();
        $data = [];
        
        $user = $userModel->find($id);

        if($user){
            $data = $user;
        }
        return $data;
    }
}
