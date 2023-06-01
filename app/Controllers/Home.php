<?php

namespace App\Controllers;

use App\Models\AssetModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();

        $this->session = \Config\Services::session();

        $this->validation = \Config\Services::validation();

    }

    public function dashboard(){
        $assetModel = new AssetModel();

        $assets = $assetModel->findAll();

        return view('Pages/dashboard', compact("assets"));
    }
    public function index()
    {
        return view('Pages/login');
    }

    public function register(){
        return view('Pages/register');
    }
}
