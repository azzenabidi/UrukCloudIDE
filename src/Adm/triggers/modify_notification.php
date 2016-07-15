<?php
$id=$_GET['id'];
$note=$_GET['note'];

require __DIR__.'/../../../vendor/autoload.php';
use UrukCloudIDE\Controller\Notification_Controller;

$notification= new Notification_Controller();
$notification->updatenotification_action($id, $note);
