<?php
$project_name=$_GET['projectname'];
require_once(__DIR__.'/../../../vendor/autoload.php');
use Devbox\Controller\Project_Controller;

$project= new Project_Controller();
session_start();
$project->addproject_action($project_name, $_SESSION['user_id'], $_SESSION['login']);
