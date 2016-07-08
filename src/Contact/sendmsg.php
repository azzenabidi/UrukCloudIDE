<?php
$id=$_GET['id'];
$note=$_GET['note'];
require_once(__DIR__.'/../../vendor/autoload.php');
use Devbox\Controller\Message_Controller;

$msg= new Message_Controller();
$msg->sendmsg_action($note, $id);
