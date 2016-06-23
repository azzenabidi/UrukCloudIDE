<?php
$id=$_GET['id'];
require_once($_SERVER["DOCUMENT_ROOT"]."/editor/Controller/Notification_Controller.class.php");
$note= new Notification_Controller();
$note->deletenotification_action($id);
?>
