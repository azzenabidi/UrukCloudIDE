<?php
if (file_exists("install")) {
    header("Location:install/index.php");
} else {
    header("Location:src/index.php");
}
