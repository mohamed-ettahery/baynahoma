<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
class Home extends BaseController
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
        // $users = $this->model->select("*")->orderBy('rand()')->limit(1);
        $users1 = $this->model->orderBy('rand()')->where("is_admin",0)->findAll("4");
        $users2 = $this->model->orderBy('rand()')->where("is_admin",0)->findAll("4");
        $users3 = $this->model->orderBy('rand()')->where("is_admin",0)->findAll("4");

        return view('home',["users1"=>$users1,"users2"=>$users2,"users3"=>$users3]);
    }
    public function privacy()
    {
        return view('privacy');
    }
}
