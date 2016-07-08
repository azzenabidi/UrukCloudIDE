<?php
$login=$_GET['login'];
require __DIR__.'/../../../vendor/autoload.php';
use Devbox\Controller\User_Controller;

$user= new User_Controller();
$user->deleteuser_action($login);
