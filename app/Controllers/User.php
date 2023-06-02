<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class User extends ResourceController
{
    protected $db, $session, $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }

    public function index(){
        $userModel = new UserModel();

        $data['users'] = $userModel->findAll();

        return $this->respond($data);
    }

    public function login(){
        
        $request = $this->request->getVar();
        $session = $this->session;

        $result = [];

        $userModel = new UserModel();

        $data['email'] = $request['email'] ?? "";
        $data['password'] = $request['password'] ?? "";

        if(!empty($data['email']) && !empty($data['password'])){
            $user = $userModel->where('email',$data['email'])->first() ?? [];

            if(count($user) > 0){

                if(password_verify($data['password'], $user['password'])){

                    $session->set([
                        'email' => $user['email'],
                        'id' => $user['id']
                    ]);
                    
                    $result = [
                        'status' => 'success',
                        'message' => 'User Auth Successfully.',
                        'userId' => $user['id']
                    ];
                }else{

                    $result = [
                        'status' => 'fail',
                        'message' => 'Enter Correct password',
                        
                    ]; 
                }


            }else{
                $result = [
                    'status' => 'fail',
                    'message' => 'Email is not registered!'
                ]; 
            }

        }else{
            $result = [
                'status' => 'fail',
                'message' => 'Required Email and Password'
            ];
        }

        return $this->respond($result);

    }

    public function register(){

        $data = $this->request->getVar();
        $session = $this->session;
        $validation = $this->validation;

        $result = [];

        $users = new UserModel();

        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|unique',
            'password' => 'required|matches[password]',
            'confpassword'    => 'required|matches[password]',
        ];

        if(empty($data['name']) || empty($data['email']) || empty($data['password']) || empty($data['confpassword'])){
            $result = [
                'status' => 'fail',
                'message' => 'Please fill all the required fields'
            ];
        }else{
            $record['name'] = $data['name'];
            $record['email'] = $data['email'];
            $record['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
            if(count($record) > 0){
                $insertData = $users->insert($record);
                if($insertData){
                    $result = [
                        'status' => 'success',
                        'message' => 'Record Inserted Successfully',
                    ];
                    // $session->setFlashdata('success' , "User created Successfully");
    
                    // return redirect()->to(base_url("/register"));
                }else{

                    $result = [
                        'status' => 'fail',
                        'message' => 'User not created',
                    ];
                    // $session->setFlashdata('success' , "User not created");
    
                    // return redirect()->to(base_url("/register"));
                }
            }
        }

            
        return $this->respond($result);

    }
}
