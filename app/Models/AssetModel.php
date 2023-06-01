<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'assets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'name',
        'description',
        'installationYear',
        'expectedUsefulLife',
        'renewableYear',
        'condition',
        'quantity', 
        'userId',
        'unitCost',
        'estimatedCost',
        'createdAt',
        'updatedAt',
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

    public function getHistory($id = 0): array{
        if($id > 0){
            $data = [];
            $historyModel = new AssetHistoryModel();

            $history = $historyModel->where('assetId', $id)->findAll();

            if($history){
                $data = $history;
            }

            return $data;
        }

    }

    public function hasForeignRelation($id): bool{
        if($id > 0){
            $data = [];
            $historyModel = new AssetHistoryModel();

            $history = $historyModel->where('assetId', $id)->findAll();

            if($history){
                $data = $history;
            }

            if(count($data) > 0){
                return true;
            }else{
                return false;
            }
            
        }
    }

    public function getUser($id){
        $userModel = new UserModel();
    }
}
