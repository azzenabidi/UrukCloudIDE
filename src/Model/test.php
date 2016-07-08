<?php
require_once("File.class.php");
$fichier=new File();
$fichier->setfileid("3");
$fichier->defaultconstructor("alex.pas", "6", "zizo", "alex");
$result=$fichier->delete_file();
if ($result==1) {
    echo "File deleted !";
} else {
    echo "file exis";
}
