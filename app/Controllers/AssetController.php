<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetModel;

class AssetController extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }

    public function index()
    {
        return view('Pages/create-asset');
    }

    public function saveAsset(){

        $record = [];

        $request = $this->request->getVar();
        $session = $this->session;

        $assetModel = new AssetModel();

        if($session->get('id')){
            $user_id = $session->get('id');

            $record['name'] = $request['name'] ?? "NO NAME";
            $record['description'] = $request['description'] ?? "NA";
            $record['installationYear'] = $request['installation_year'];
            $record['expectedUsefulLife'] = $request['expected_useful_life'];
            $record['renewableYear'] = $request['renewable_year'];
            $record['condition'] = $request['condition'];
            $record['quantity'] = $request['quantity'];   
            $record['userId'] = $user_id;
            $record['unitCost'] = $request['unit_cost'];
            $record['estimatedCost'] = $request['estimated_cost'];

            if(count($record) > 0){
                $assetModel->insert($record);
                $session->setFlashdata('success' , "Asset created successfully!");
                return redirect()->to(base_url("/dashboard"));
            }else{
                $session->setFlashdata('fail' , "Something went wrong!");
                return redirect()->to(base_url("/create-asset"));
            }
            
        }else{
            $session->setFlashdata('fail' , "you must login first!");
            return redirect()->to(base_url("/login"));
        }

        // dd($request);


    }
}
