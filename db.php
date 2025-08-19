<?php
$host = "localhost";
$dbname = "dbselwr17r44rd";
$username = "ufgzffdwyusgm";
$password = "ifqlkpgc9quz";
 
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
