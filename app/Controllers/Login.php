<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
class Login extends BaseController
{
    private $model;
    private $userID;
    public function __CONSTRUCT()
    {
        $this->model = new UserModel;
        $this->userID = session("id");
    }
    public function index()
    {
        return view('login');
    }
    public function auth()
    {
        $username = $this->request->getVar("userName");
        $password = $this->request->getVar("password");


        $user = $this->model->where("userName",$username)->first();

        if(!$user || !password_verify($password,$user->password))
        {
                return "failed";
        }
        if(!$user->is_active)
        {
            return "suspended";
        }

        $session = session();
        $session->regenerate();
        $session->set("logged",true);
        $session->set("id",$user->id);
        $session->set("admin",$user->is_admin);
        $session->set("username",$user->userName);

        if($user->is_admin)
        {
            return "admin";
        }
        $this->model->update($user->id,["is_online"=>true]);

        return "connect";
    }
    public function logOut()
    {
        $this->model->update($this->userID,["is_online"=>false]);
        session()->destroy();
        return redirect()->to("Login");
    }
}
