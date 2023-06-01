<?php

namespace App\Controllers;

use App\Models\AssetHistoryModel;
use App\Models\AssetModel;

use CodeIgniter\RESTful\ResourceController;

class AssetControllerA extends ResourceController
{

    protected $db, $session, $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }

    public function saveAsset(){

        $record = [];

        $result = [];

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

                $inserted = $assetModel->insert($record);

                if($inserted){
                    $result = [
                        'status' =>'success',
                        'message' => 'Records inserted successfully.'
                    ];
                }else{
                    $result = [
                        'status' =>'fail',
                        'message' => 'Something went wrong contact support!.'
                    ];
                }

            }else{
                $result = [
                    'status' =>'fail',
                    'message' => 'Something went wrong contact support!.'
                ];
            }
            
        }else{
            $result = [
                'status' =>'fail',
                'message' => 'you must login first!.'
            ];
        }

        return $this->respond($result);
    }


    public function deleteAsset($id = 0){
        $result = [];

        if($id > 0){
            $assetModel = new AssetModel();
            $session = $this->session;

            if($assetModel->find($id)){
                if($assetModel->hasForeignRelation($id)){

                    $result = [
                        'status' => 'fail',
                        'message' => 'Record has Foreign History data!'
                    ];

                }else{
                    $assetModel->delete($id);
                    $result = [
                        'status' => 'success',
                        'message' => 'Asset deleted successfully!'
                    ];

                }
              
            }else{
                $result = [
                    'status' => 'fail',
                    'message' => 'Record not found!'
                ];

            }
        }
        return $this->respond($result);
    }

    public function editAsset($id = 0){

        $result = [];

        if($id > 0){
            $assetModel = new AssetModel();
            $session = $this->session;

            if($assetModel->find($id)){
                $asset = $assetModel->find($id);

                $result = [
                    'status' => 'success',
                    'asset' => $asset,
                ];

            }else{
                $result = [
                    'status' => 'fail',
                    'message' => "Record not found!",
                ];

            }
        }
    }

    public function saveEdit(){

        $result = [];

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

                $result = [
                    'status' => 'success',
                    'message' => "Asset Updated successfully!",
                ];
            }
            
        }else{
            $result = [
                'status' => 'fail',
                'message' => "Something went wrong!",
            ];
    
        }

        return $this->respond($result);

    }
}
