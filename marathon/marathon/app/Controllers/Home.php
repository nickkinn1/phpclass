<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        helper("form");
        return view('homepage');
    }

    public function login(): string
    {
        helper("form");

        $rules = [
            "username" => "required|valid_email",
            "password" => "required"
        ];

       if(! $this->validate($rules)){
            "load_error" => "true";
       }

        return view('homepage');
    }

    public function create(): string
    {
        helper("form");
        echo "Create";
        exit();
    }
}

