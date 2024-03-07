<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MessageModel;
use App\Entities\User;
use App\Entities\Message;
class Messages extends BaseController
{
    private $user;
    private $message;
    private $userID;
    public function __CONSTRUCT()
    {
        $this->user = new UserModel;
        $this->message = new MessageModel;
        $this->userID = session("id");
    }
    public function index()
    {
        $db      = \Config\Database::connect();
        // $Query   = "SELECT * FROM `users` WHERE id != $this->userID AND id IN(SELECT msgFrom FROM messages WHERE msgTo = $this->userID or msgFrom = $this->userID)";
        $Query   = "SELECT * FROM `users` WHERE id != $this->userID AND (id IN(SELECT msgFrom FROM messages WHERE msgTo = $this->userID or msgFrom = $this->userID) OR id IN(SELECT msgTo FROM messages WHERE msgTo = $this->userID or msgFrom = $this->userID))";
        $builder = $db->query($Query);
        $getUsers  = $builder->getResult();

        $getChatUser = $this->request->getVar("user");
        if(!isset($getChatUser) or empty($getChatUser))
        {
            return view('messages',["users"=>$getUsers]);
        }
        else
        {
            $Query   = "SELECT * FROM `messages` WHERE (msgFrom = $this->userID and msgTo = $getChatUser) or (msgFrom = $getChatUser and msgTo = $this->userID)";
            $builder = $db->query($Query);
            $messages  = $builder->getResult();

            $getChatUser = $this->user->find($getChatUser);

            // print_r($getChatUser);
            return view('messages',["users"=>$getUsers,"chatUser"=>$getChatUser,"messages"=>$messages]);
        }
    }
    public function sendMsg()
    {
        $data = [
            'msg'        => $this->request->getPost("msg"),
            'msgFrom'    => $this->userID,
            'msgTo'      => $this->request->getPost("msgTo"),
        ];
      return  $this->message->insert($data);
        // return redirect()->back();
    }
    // AJAX
    public function getMessages()
    {
        $this->response->setContentType( 'application/json ');

        $getChatUser = $this->request->getVar("user");

        $db      = \Config\Database::connect();
        $Query   = "SELECT * FROM `messages` WHERE (msgFrom = $this->userID and msgTo = $getChatUser) or (msgFrom = $getChatUser and msgTo = $this->userID)";
        $builder = $db->query($Query);
        $messages  = $builder->getResult();

        return $this->response->setJSON($messages);

    }
    public function isUserChatOnline()
    {
        // $this->response->setContentType('application/json ');
        $userChat = $this->request->getVar("user");
        $status = $this->user->select("is_online")->where("id",$userChat)->first();
        return $status->is_online ? "متصل الان":"غير متصل الان";
        // return $status->is_online ? "online":"offline";
    }
    public function getChatUsers()
    {
        $this->response->setContentType('application/json ');
        $db      = \Config\Database::connect();
        $Query   = "SELECT * FROM `users` WHERE id != $this->userID AND id IN(SELECT msgFrom FROM messages WHERE msgTo = $this->userID or msgFrom = $this->userID)";
        $builder = $db->query($Query);
        $users  = $builder->getResult();

        return $this->response->setJSON($users);
    }
    public function getChatUsersLastMsg()
    {
        // $this->response->setContentType('application/json');
        $user_id = $this->request->getVar("user");
        $db       = \Config\Database::connect();
        $me       = $this->userID;
        $Query    = "SELECT * FROM `messages` WHERE (msgFrom = $me and msgTo = $user_id) or (msgFrom = $user_id and msgTo = $me) ORDER BY id DESC LIMIT 1";
        $builder  = $db->query($Query);
        $lastMsg  = $builder->getResult();
        $msg = $lastMsg[0]->msg;
        if(strlen($msg)>15)
        {
            $msg = substr($msg,0,15)."...";
        }
        $msg = $lastMsg[0]->msgFrom == $me ?"<strong>انت</strong> : ". $msg:$msg;
        return $msg;
    }

    public function getCountNotRead()
    {
        $db       = \Config\Database::connect();
        $me       = $this->userID;
        $Query    = "SELECT COUNT(*) as 'count' FROM messages WHERE is_read = 0 AND msgTo = $me";
        $builder  = $db->query($Query);
        $count  = $builder->getResult();
        $count = $count[0]->count;

        return $count;
    }
    public function UpdateMsgSetIsRead()
    {
        $db       = \Config\Database::connect();

        $userChat = $this->request->getVar("user");
        $me       = $this->userID;
        $Query    = "UPDATE messages SET is_read = 1 WHERE msgTo = $me AND msgfrom = $userChat";
        $db->query($Query);
    }
}
