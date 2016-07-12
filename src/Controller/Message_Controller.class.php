<?php

namespace Devbox\Controller;

use Devbox\Model\Message;

class Message_Controller
{
    public $msg;
    public function __construct()
    {
        $this->msg= new Message();
    }
    public function index()
    {
        $data= $this->msg->getmsg();
        if($data->rowCount()==0)
        {
          return 0;
        }
          else {


        return $data ;}

    }
    public function sendmsg_action($msg, $user_id)
    {
        if (!empty($msg) and !empty($user_id)) {
            $this->msg->setcontent($msg);
            $this->msg->setuserid($user_id);
            $result=$this->msg->contact();
            if ($result==1) {
                echo "<p class='success'>Your message has been sent successfully!</p>";
            } else {
                echo "<p class='error2'>Ooops! your message has not been sent!</p>";
            }
        }
    }
    public function readmsg_action($id)
    {
        $this->msg->setmsgid($id);
        return $this->msg->getmsgbyid();
    }
    public function viewmsgbox()
    {
        $data= $this->msg->getlatest();
        if($data->rowCount()==0)
        {
          return 0;
        }
          else {


        return $data ;}
    }
}
