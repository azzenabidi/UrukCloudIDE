<?php
if (file_exists("src/Install")) {
    header("Location:src/Install/install.html");
} else {
    header("Location:src/index.php");
}
