<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
class Register extends BaseController
{
    private $model;
    public function __CONSTRUCT()
    {
        $this->model = new UserModel;
    }
    public function index()
    {
        return view('register');
    }
    public function store()
    {
        $user = new User($this->request->getPost());
        $oldPswValue = $user->password;
        if(strlen($user->password)>=6)
        {
            $user->password = password_hash($user->password,PASSWORD_DEFAULT);
        }
        $user->birthday = $this->request->getPost("year") . $this->request->getPost("month") . $this->request->getPost("day");
        //Insertion
        if($this->model->insert($user))
        {
            return redirect()->to("Login")
            ->with("success","تم انشاء حسابك <strong>بنجاح</strong>!");
        }
        else
        {
            $user->password = $oldPswValue;
            return redirect()->back()
            ->with("errors",$this->model->errors())
            ->withinput();        }
    }
}
