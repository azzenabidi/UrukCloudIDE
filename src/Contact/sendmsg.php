<?php
$id=$_GET['id'];
$note=$_GET['note'];
require_once($_SERVER["DOCUMENT_ROOT"]."/editor/Controller/Message_Controller.class.php");
$msg= new Message_Controller();
$msg->sendmsg_action($note,$id);
?>
