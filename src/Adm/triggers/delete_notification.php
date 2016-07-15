<?php
$id=$_GET['id'];
require __DIR__.'/../../../vendor/autoload.php';
use UrukCloudIDE\Controller\Notification_Controller;

$note= new Notification_Controller();
$note->deletenotification_action($id);
