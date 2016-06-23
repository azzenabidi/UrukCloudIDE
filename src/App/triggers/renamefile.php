<?php
session_start();
file_name=$_GET['filename'];
require_once(__DIR__.'/../../../vendor/autoload.php');
use Devbox\Controller\Project_Controller;
use Devbox\Controller\File_Controller;
$project= new Project_Controller();
$file= new File_Controller();
//Frozen feature
?>
