<?php
$username=$_GET['username'];
$login=$_GET['login'];
$oldlogin=$_GET['oldlogin'];
$pwd=$_GET['pwd'];
$user_id=$_GET['userid'];
require __DIR__.'/../../../vendor/autoload.php';
use UrukCloudIDE\Controller\User_Controller;

$user= new User_Controller();
$user->updateuser_action($oldlogin, $user_id, $login, $username, $pwd);
