<?php
if(isset($_GET['file']))
{
$file=$_GET['file'];
session_start();

$_SESSION['filesave']='/var/www/html/Devbox/src/App/'.$file;
$read=file($file);
foreach($read as $line)
{
echo $line;
	}
	

	
	
}	
?>    
