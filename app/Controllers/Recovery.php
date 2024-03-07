<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Entities\User;

class Recovery extends BaseController
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
    public function sendVerificationCode()
    {
        $email = $this->request->getPost("email");
        $validation = $this->validate([
            "email"   =>"required|valid_email",
            ]);
            if($validation)
            {
                $user = $this->model->where("email",$email)->first();
                $session = session();
                if($user)
                {
                    $session->set("user_id",$user->id);
                    $code = substr(random_string(6),0,6);
                    $to = $email;
    
                    $email = \Config\Services :: email();
                    $email->setTo($to);
                    $email->setFrom("baynahoma.com","baynahoma");
                    $email->setSubject(" استرجاع كلمه السر");
                    $email->setMessage("
                    <h2>الرمز</h2>
                    $code
                    ");
    
    
                    if($email->send()){
                        $session->set("code",$code);
                        return "code_sent";
                    }
                    else{
                        return "email_not_sent";
                    }
                }
                else
                {
                  return "not_found";
                }
            }
            else
            {
                return "email_not_valid";
            }
    }
    // public function verification()
    // {
    //     if(!session()->has("code"))
    //     {
    //         return redirect()->to("Recovery/index");
    //     }
    //     return view("verification");
    // }
    public function newPassword()
    {
        $code = $this->request->getPost("code");
        if(!empty($code))
        {
            if($code == session("code"))
            {
                $session = session();
                $session->set("valid_code",true);
                return "valid";
            }
            else
            {
                return "not_valid";
            }
        }
        else
        {
            return "empty_code";
        }
    }
    public function new_password_form()
    {
        if(!session("valid_code"))
        {
            return redirect()->to("Recovery/verification");
        }
        return view("new_password");
    }
    public function updatePassword()
    {
        $user_id = session("user_id");
        $psw = $this->request->getPost("new_psw");
        $conf_psw = $this->request->getPost("conf_new_psw");

        if(strlen($psw)>=6)
        {
            if($psw == $conf_psw)
            {
                $newPsw = password_hash($psw,PASSWORD_DEFAULT);
              if($this->model->update($user_id,["password"=>$newPsw]))
              { 
                return "success";
              }
            }
            else
            {
                return "not_match";
            }
        }
        else
        {
            return "not_enough";
        }
    }
}
