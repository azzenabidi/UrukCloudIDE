<?php
if (file_exists("install.sh")==false) {
    header("Location:src/index.php");
} else {
    echo "<H1>Please remove or rename install.sh</h1>";
}
