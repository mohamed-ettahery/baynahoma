<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
class Search extends BaseController
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
        return view('search');
    }
    public function result()
    {

        $gender = $this->request->getVar("gender");
        $country = $this->request->getVar("country");
        $minAge = $this->request->getVar("min-age");
        $maxAge = $this->request->getVar("max-age");


        $whereArray = [];


        if(!empty($gender))
        {
            $whereArray["gender"] = $gender;
        }
        if(!empty($country) && $country != "0")
        {
            $whereArray["country"] = $country;
        }

        if(!empty($maxAge) && $maxAge != "0")
        {
            $maxYear = date("Y") - $maxAge;
            $whereArray["year(birthday)>="] = $maxYear;
        }

        if(!empty($minAge) && $minAge != "0")
        {
            $minYear = date("Y") - $minAge;
            $whereArray["year(birthday)<="] = $minYear;

        }

        $whereArray["is_admin"] = 0;
        
        $users = $this->model->select("*")->where($whereArray)->paginate(8);
        return view('result',["users"=>$users,"pager"=>$this->model->pager]);
    }
}
