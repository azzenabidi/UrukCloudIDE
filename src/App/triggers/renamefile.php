<?php
session_start();
file_name=$_GET['filename'];
require_once(__DIR__.'/../../../vendor/autoload.php');
use UrukCloudIDE\Controller\Project_Controller;
use UrukCloudIDE\Controller\File_Controller;
$project= new Project_Controller();
$file= new File_Controller();
//Frozen feature
?>
