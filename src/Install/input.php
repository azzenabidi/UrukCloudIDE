<?php
function run_sql_file($location)
{
    //load file
    $commands = file_get_contents($location);
    //delete comments
    $lines = explode("\n", $commands);
    $commands = '';
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line & !startsWith($line, '--')) {
            $commands .= $line . "\n";
        }
    }
    //convert to array
    $commands = explode(";", $commands);
    //run commands
    $total = $success = 0;
    foreach ($commands as $command) {
        if (trim($command)) {
            $success += (@mysql_query($command)==false ? 0 : 1);
            $total += 1;
        }
    }
    //return number of successful queries and total number of queries found
    return array(
        "success" => $success,
        "total" => $total
    );
}
function rp($file, $username, $password, $server, $database_name)
{
    file_put_contents($file, str_replace("root", $username, file_get_contents($file)));
    file_put_contents($file, str_replace("linux", $password, file_get_contents($file)));
    file_put_contents($file, str_replace("localhost", $server, file_get_contents($file)));
    file_put_contents($file, str_replace("application", $database_name, file_get_contents($file)));
}
$username = $_POST["username"];
$password = $_POST["password"];
$database_server = $_POST["server"];
$database_name = $_POST["name"];
$conn = new mysqli($database_server, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
run_sql_file("application.sql");
rp("config/dbConn.class.php", $username, $password, $database_server, $database_name);
echo "installing successfully";
?> 
