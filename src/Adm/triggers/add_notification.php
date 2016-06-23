<?php
$id="1";
$note=$_GET['note'];
require __DIR__.'/../../../vendor/autoload.php';
use Devbox\Controller\Notification_Controller;
$notification= new Notification_Controller();
$notification->addnotification_action($note,$id);
?>
