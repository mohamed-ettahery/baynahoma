<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Entities\User;

class Account extends BaseController
{
    private $model;
    public function __CONSTRUCT()
    {
        $this->model = new UserModel;
    }
    public function index()
    {
        return view("password_recovery");
    }
    public function check_code()
    {
        if(!session()->has("code"))
        {
            return redirect()->to("Account/index");
        }
        return view("verification");
    }
}
