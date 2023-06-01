<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('Pages/login');
    }

    public function register(){
        return view('Pages/register');
    }
}
