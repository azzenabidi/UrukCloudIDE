<?php
require_once(__DIR__.'/../../../vendor/autoload.php');
use Devbox\Controller\User_Controller;
$test= new User_Controller();
session_start();
$test->user_disconnect_action($_SESSION['login']);


?>
