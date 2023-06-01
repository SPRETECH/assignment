<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AssetHistoryModel;
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
    }

    public function deleteAsset($id = 0){
        if($id > 0){
            $assetModel = new AssetModel();
            $session = $this->session;

            if($assetModel->find($id)){
                if($assetModel->hasForeignRelation($id)){
                    $session->setFlashdata('fail' , "Record has Foreign History data!");
                    return redirect()->to(base_url("/dashboard"));
                }else{
                    $assetModel->delete($id);
                    $session->setFlashdata('success' , "Asset deleted successfully!");
                    return redirect()->to(base_url("/dashboard"));
                }
              
            }else{
                $session->setFlashdata('fail' , "Record not found!");
                return redirect()->to(base_url("/dashboard"));
            }
        }
    }

    public function editAsset($id = 0){
        if($id > 0){
            $assetModel = new AssetModel();
            $session = $this->session;

            if($assetModel->find($id)){
                $asset = $assetModel->find($id);

                return view('Pages/edit-asset', compact("asset"));

            }else{
                $session->setFlashdata('fail' , "Record not found!");
                return redirect()->to(base_url("/dashboard"));
            }
        }
    }

    public function saveEdit(){
        $request = $this->request->getVar();
        $record = [];

        $session = $this->session;
        $user_id = $session->get('id');
        $assetModel = new AssetModel();
        
        $assetId = $request['asset_id'];

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
            $updated = $assetModel->where('id',$assetId)->set($record)->update();

            if($updated){

                $assetHistory = new AssetHistoryModel();

                $history = [
                'assetId' => $assetId,
                'action' => "Edited",
                'userId' => $user_id,
                ];

                $assetHistory->insert($history);

                $session->setFlashdata('success' , "Asset Updated successfully!");
                return redirect()->to(base_url("/dashboard"));
            }
            
        }else{
            $session->setFlashdata('fail' , "Something went wrong!");
            return redirect()->to(base_url("/edit-asset"));
        }

    }
}
