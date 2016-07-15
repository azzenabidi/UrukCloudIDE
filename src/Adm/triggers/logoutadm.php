<?php
require_once(__DIR__.'/../../../vendor/autoload.php');
use UrukCloudIDE\Controller\Admin_Controller;

$test= new Admin_Controller();
session_start();
$test->admin_disconnect_action($_SESSION['admin_login']);
