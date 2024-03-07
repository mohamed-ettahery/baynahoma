<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MessageModel;
use App\Entities\User;
use App\Entities\Message;
class Users extends BaseController
{
    private $model;
    private $message;
    private $userID;
    public function __CONSTRUCT()
    {
        $this->model = new UserModel;
        $this->message = new MessageModel;
        $this->userID = session("id");
    }
    public function myProfile()
    {
        $user = $this->model->find($this->userID);
        return view('myProfile',["user"=>$user]);
    }
    public function Profile($idUser)
    {
        if($idUser==$this->userID)
        {
            return redirect()->to('Users/myProfile');
        }
        $user = $this->model->find($idUser);

        if($user->is_admin)
        {
            return redirect()->to('/');
        }

        return view('profile',["user"=>$user]);
    }
    public function editForm()
    {
        $user = $this->model->find($this->userID);
        return view('edit-info',["user"=>$user]);
    }
    public function update()
    {
        // return "yes";
        $user = $this->model->find($this->userID);
        $user->fill($this->request->getPost());

        // ***********************
                //upload image file

                $file = $this->request->getFile('image');
                if ($file->isValid()) {
                        //check Extension
                        $fileType = $file->getMimeType();
                        $types = ['image/jpg','image/jpeg','image/png'];
                        if(!in_array($fileType,$types))
                        {
                          return "extension";
                        }
                        //check Size
                        $fileSize = $file->getSizeByUnit("mb");
                        if($fileSize > 2) {
                          return "size";
                        }

                        $old_img_name = $this->request->getPost('hidden_image_name');
                        $fileName = $file->getRandomName();
                        $user->image = $fileName;
                        if($file->move("./images/profiles",$fileName))
                        {
                            if(file_exists("./images/profiles/".$old_img_name) && $old_img_name!="default.jpg")
                            {
                                unlink("./images/profiles/".$old_img_name);
                            }
                        }   
                }
      
        
        // ***********************

        if($user->hasChanged('firstName')||$user->hasChanged('lastName')||$user->hasChanged('birthday')||$user->hasChanged('country')||$user->hasChanged('city')||$user->hasChanged('phone')||$user->hasChanged('email')||$user->hasChanged('about')||$user->hasChanged('image'))
        {
            if($this->model->save($user))
            {
                return "save";
            }
            else
            {
                $this->response->setContentType( 'application/json ');
                return $this->response->setJSON($this->model->errors());
            }
        }
        else
        {
            return "nothing_changed";
        }
    }
    public function updateOnlyPhoto()
    {
        $file = $this->request->getFile('image');
        if ($file->isValid()) {
                //check Extension
                $fileType = $file->getMimeType();
                $types = ['image/jpg','image/jpeg','image/png'];
                if(!in_array($fileType,$types))
                {
                return redirect()->back()
                ->with('error' , "امتداد الصوره غير موافق")
                ->withinput();
                }
                //check Size
                $fileSize = $file->getSizeByUnit("mb");
                if($fileSize > 2) {
                return redirect()->back()
                ->with('error' , "حجم الصوره لا يجب ان يتعدى 2 ميغا بايت")
                ->withinput();
                }

                $old_img_name = $this->request->getPost('old_img_value');
                $fileName = $file->getRandomName();

                $updated = $this->model->update($this->userID,[
                    "image"       => $fileName,
                ]);        
                if($updated)
                {
                    if($file->move("./images/profiles",$fileName))
                    {
                        if(file_exists("./images/profiles/".$old_img_name) && $old_img_name!="default.jpg")
                        {
                            unlink("./images/profiles/".$old_img_name);
                        }
                    }   

                    return redirect()->back()
                    ->with("success"," تم تعديل الصوره بنجاح!");
                }
                else
                {
                    return redirect()->back()
                    ->with("errors",$data->errors())
                    ->withinput();
                }
        }
         
    }
    public function deleteAccount()
    {
        $user = $this->model->find($this->userID);
        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User Not found !");
        }
        if($this->model->delete($this->userID))
        {
            session()->destroy();
            return redirect()->to("Login");
        }
    }
    public function editPswForm()
    {
        return view("edit-password");
    }
    public function updatePassword()
    {
        $user = $this->model->find($this->userID);
        if(password_verify($this->request->getPost("old_psw"),$user->password))
        {
            $new_psw = $this->request->getPost("new_psw");
            $conf_new_psw = $this->request->getPost("conf_new_psw");
            if(strlen($new_psw)>=6)
            {
                if($new_psw == $conf_new_psw)
                {
                    $update = $this->model->update($this->userID,["password"=>password_hash($new_psw,PASSWORD_DEFAULT)]);
                    if($update)
                    {
                        return redirect()->to('Users/editPswForm')->with("success"," تم تعديل رمزك السري بنجاح!");
                    }
                    else
                    {
                        return redirect()->back()->with("errors",$this->model->errors());
                    }
                }
                else
                {
                    return redirect()->back()->with("error","  يجب ان يكون حقل الرمز السري الجديد وحقل تاكيد الرمز السري  متطابقان !");
                }
            }
            else
            {
                return redirect()->back()->with("error"," يجب ان لا يقل رمزك السري عن سته احرف !");
            }
        }
        else
        {
            return redirect()->back()->with("error","الرمز الحالي السري الذي ادخلته غير صحيح !");
        }
    }
}
