<?php
namespace Devbox\Model;

use Devbox\DAO\MessageDAO;

class Message
{
    public $msg_id;
    public $content;
    public $user_id;
    public $user_login;
//load the DAO Message Object

public function __construct()
{
    $this->db=new MessageDAO();
}

    //default constructor

public function defaultconstructor($content, $user_id, $user_login)
{
    $this->content=$content;
    $this->user_id=$user_id;
    $this->user_login=$user_login;
}



//Message Class setters

public function setcontent($content)
{
    $this->content=$content;
}

    public function setuserid($user_id)
    {
        $this->user_id=$user_id;
    }
    public function setmsgid($msg_id)
    {
        $this->msg_id=$msg_id;
    }
    public function setuserlogin($user_login)
    {
        $this->user_login=$user_login;
    }
//Message class getters
public function getcontent()
{
    return $this->content;
}
    public function getuserid()
    {
        return $this->user_id;
    }
    public function getmsgid()
    {
        return $this->msg_id;
    }

    public function getuserlogin()
    {
        return $this->user_login;
    }

//************************************Message Data Management Methods*************************************************************

//this method adds a message

public function contact()
{
    //Contact the admin

$this->db->contactdao($this->content, $this->user_id);

    return 1;
}


    public function getmsg()
    {
        $data=$this->db->viewdao();
        return $data;
    }
    public function getmsgbyid()
    {
        $data=$this->db->getmsgbyiddao($this->msg_id);
        return $data;
    }
    public function getlatest()
    {
        $data=$this->db->getlatestdao();
        return $data;
    }
}
