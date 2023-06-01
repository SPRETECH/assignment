<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }

    public function login(){
        $request = $this->request->getVar();
        $session = $this->session;

        $userModel = new UserModel();

        $data['email'] = $request['email'] ?? "";
        $data['password'] = $request['password'] ?? "";

        if(!empty($data['email']) && !empty($data['password'])){
            $user = $userModel->where('email',$data['email'])->first() ?? [];

            if(count($user) > 0){

                if(password_verify($data['password'], $user['password'])){
                    return view('Pages/home', compact("user"));
                }else{
                    $session->setFlashdata('fail' , "Enter correct password!");
                    return redirect()->to(base_url("/login"));
                }

                echo "<pre>";
                print_r($user);

            }else{
                $session->setFlashdata('fail' , "Email is not registered!");
                return redirect()->to(base_url("/login"));
            }

        }else{
            $session->setFlashdata('fail' , "Please enter username and password");
            return redirect()->to(base_url("/login"));
        }

    }

    public function register(){

        $data = $this->request->getVar();
        $session = $this->session;

        $users = new UserModel();

        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|matches[password]',
            'confpassword'    => 'required|matches[password]',
        ];

        $record['name'] = $data['name'];
        $record['email'] = $data['email'];
        $record['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        if(count($record) > 0){
            $result = $users->insert($record);
            if($result){

                $session->setFlashdata('success' , "User created Successfully");

                return redirect()->to(base_url("/register"));
            }else{
                $session->setFlashdata('success' , "User not created");

                return redirect()->to(base_url("/register"));
            }
        }

    }
}
