<?php
$data=$_GET['data'];
require_once(__DIR__.'/../../../vendor/autoload.php');
use Devbox\Controller\File_Controller;

$file= new File_Controller();
session_start();
if (!isset($_SESSION['filesave'])) {
    echo "<p class='text-warning'>The file couldn't be saved</p>";
} else {
    $file->savefile_action($_SESSION['filesave'], $data);
}
unset($_SESSION['filesave']);
