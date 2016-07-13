<?php

namespace Devbox\Controller;

use Devbox\Model\Notification;

class Notification_Controller
{
    public $note;
    public function __construct()
    {
        $this->note= new Notification();
    }
    public function index()
    {
        $data= $this->note->getnotifications();
        if($data->rowCount()==0)
        {
          return 0;
        }
          else {


        return $data ;}

    }
    public function addnotification_action($text, $admin_id)
    {
        if (!empty($text) and !empty($admin_id)) {
            $this->note->defaultconstructor($text, $admin_id);
            $result=$this->note->addnotification();
            if ($result==1) {
                echo "<p class='success'>Notification Added successfully!</p>";
            } else {
                echo "<p class='error2'>Ooops! Something went wrong</p>";
            }
        } else {
            echo "Notification Field Must not be empty!";
        }
    }
    public function updatenotification_action($note_id, $content)
    {
        if (!empty($note_id) and  !empty($content)) {
            $this->note->setnotificationid($note_id);
            $this->note->setcontent($content);
            $result=$this->note->updatenotification();
            if ($result==1) {
                echo "<p class='success'>Notification Updated successfully!</p>";
            } else {
                echo "Ooops! Something went wrong";
            }
        } else {
            echo "Notification Field  Must not be empty!";
        }
    }
    public function deletenotification_action($note_id)
    {
        if (!empty($note_id)) {
            $this->note->setnotificationid($note_id);
            $result=$this->note->deletenotification();
            if ($result==1) {
                echo "<p class='success'>Notification Deleted successfully!</p>";
            } else {
                echo "Ooops! Something went wrong";
            }
        } else {
            echo "An expected bug happened !";
        }
    }
    public function search_action($id)
    {
        $this->note->setnotificationid($id);
        return $this->note->getnotificationsbyid();
    }
    public function getlatestnotification_action()
    {
        return $this->note->getlatestnotification();
    }
}
