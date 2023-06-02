<?php

namespace App\Controllers;

use App\Models\AssetModel;
use CodeIgniter\RESTful\ResourceController;

class AssetHistory extends ResourceController
{
    protected $db, $session, $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }


    public function index($id = 0)
    {
        $result = [];

        if($id > 0){
            $assetModel = new AssetModel();
            $result['history'] = $assetModel->getHistory($id) ?? [];
        }
        return $this->respond($result);
    }
}
