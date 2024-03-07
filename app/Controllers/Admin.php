<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Entities\User;
class Admin extends BaseController
{
    private $model;
    private $userID;
    public function __CONSTRUCT()
    {
        $this->model = new UserModel;
        $this->userID = session("id");
    }
    public function users()
    {
        // $users = $this->model->orderBy("created_at","DESC")->Where("is_admin",false)->findAll();
        $users = $this->model->orderBy("created_at","DESC")->Where("is_admin",false)->paginate(5);
        return view('admin/users',["users"=>$users,"pager"=>$this->model->pager]);
    }
    public function suspended()
    {
        $users = $this->model->orderBy("created_at","DESC")->Where(["is_admin"=>false,"is_active"=>false])->paginate(5);
        return view('admin/suspended',["users"=>$users,"pager"=>$this->model->pager]);
    }
    public function deleteUser($id_user)
    {
        if($this->model->delete($id_user))
        {
            return redirect()->back()->with("success"," تم الحذف بنجاح!");
        }
        else
        {
            return redirect()->back()->with("errors",$this->model->errors());
        }
    }
    public function suspendUser($id_user)
    {
        if($this->model->update($id_user,["is_active"=>false]))
        {
            return redirect()->back()->with("success"," تم الايقاف بنجاح!");
        }
        else
        {
            return redirect()->back()->with("errors",$this->model->errors());
        }
    }
    public function activeUser($id_user)
    {
        if($this->model->update($id_user,["is_active"=>true]))
        {
            return redirect()->back()->with("success"," تم التنشيط بنجاح!");
        }
        else
        {
            return redirect()->back()->with("errors",$this->model->errors());
        }
    }
}
