<?php
if (file_exists("src/Installs")) {
    header("Location:src/Install/install.html");
} else {
    header("Location:src/index.php");
}
