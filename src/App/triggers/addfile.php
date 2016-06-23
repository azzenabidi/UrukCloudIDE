<?php
$file_name=$_GET['filename'];

session_start();
$test="/var/www/html/Devbox/src/App/Users/".$_SESSION['login']."/";
$ch=str_replace($test, "",$_SESSION['project']);
$ch2=str_replace("/","",$ch);
require_once(__DIR__.'/../../../vendor/autoload.php');
use Devbox\Controller\Project_Controller;
use Devbox\Controller\File_Controller;
$project= new Project_Controller();
$file= new File_Controller();
$result=$project->getprojectid_action($ch2,$_SESSION['user_id']);
while($data=$result->fetch())
{
$id=$data['project_id'];
	}
$file->addfile_action($file_name,$id,$ch2,$_SESSION['login']);
unset($_SESSION['project']);
?>
