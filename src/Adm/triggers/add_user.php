<?php
$username=$_GET['username'];
$login=$_GET['login'];
$pwd=$_GET['pwd'];
require __DIR__.'/../../../vendor/autoload.php';
use Devbox\Controller\User_Controller;
$user= new User_Controller();
$user->adduser_action($username,$login,$pwd);
?>
