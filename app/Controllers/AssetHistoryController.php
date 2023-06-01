<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetModel;

class AssetHistoryController extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }


    public function index($id = 0)
    {
        if($id > 0){
            $assetModel = new AssetModel();

            $asset = $assetModel->find($id);
            $history = $assetModel->getHistory($id);

            if($history){
                return view('Pages/history', compact("history", "asset"));
            }else{
                return view('Pages/history');
            }
            
        }
    }
}
