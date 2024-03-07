<?php

namespace App\Controllers;

class Contact extends BaseController
{
    public function index()
    {
        return view('contact');
    }
    public function send()
    {
        // Validate Form
        $validation = $this->validate([
        "name"    => "required",
        "email"   =>"required|valid_email",
        "message" => "required"
        ]);
        if($validation){
            // echo "Valid";
            if($this->isOnline())
            {
                $to = "getswail@gmail.com";
                $name= $this->request->getPost("name");
                $emailfrom= $this->request->getPost("email");
                $message= $this->request->getPost("message");

                $email = \Config\Services :: email();
                $email->setTo($to);
                $email->setFrom("$emailfrom","$name");
                $email->setSubject("Message From Contact Page");
                $email->setMessage("$message");


                if($email->send()){
                  return redirect()->back()->with("success","Email has been sent!");
                }
                else{
                    // echo $email->printDebugger(['headers']) ;
                    return redirect()->back()->with("error"," Failed")->withInput();
                }

            }
            else{
                return redirect()->to('/contact')->with('error','Check your internet connection')->withInput();
            }
        }
        else
        {
          return view('contact',['validation'=>$this->validator]);

        }
    }
    public function isOnline($site = "https://youtube.com"){
        if(@fopen($site, "r")){
            return true;
            }else{
            return false;
            }
     }
}
