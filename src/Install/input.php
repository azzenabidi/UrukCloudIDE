<?php
/**
 * Starts With function from stackoverflow http://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php 
 **/
function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}
 
function rp($file, $username, $password, $server, $database_name)
{
    /* [TODO] : Need to add preg_match() or something more reliable ! */
    file_put_contents($file, str_replace("userdb", $username, file_get_contents($file)));
    file_put_contents($file, str_replace("userpsw", $password, file_get_contents($file)));
    file_put_contents($file, str_replace("localhost", $server, file_get_contents($file)));
    file_put_contents($file, str_replace("uruk", $database_name, file_get_contents($file)));
}
$filename = "../application.sql";
$username = $_POST["username"];
$password = $_POST["password"];
$database_server = $_POST["server"];
$database_name = $_POST["name"];
mysql_connect($database_server, $username, $password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($database_name) or die('Error selecting MySQL database: ' . mysql_error());
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}

rp("../Config/dbConn.class.php", $username, $password, $database_server, $database_name);
rename("../Install","../Install-tmp"); // Auto-rename the Install folder
echo "Install Successfull! Please head back to the home directory.";
?>
