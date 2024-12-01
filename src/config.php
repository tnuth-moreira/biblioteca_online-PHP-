<?php
$servername = "127.0.0.1"; 
$username = "root";
$password = "";
$dbname = "biblioteca_online";
$socket = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock"; 

$conn = new mysqli($servername, $username, $password, $dbname, null, $socket);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
