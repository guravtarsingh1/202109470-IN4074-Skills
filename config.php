<?php
$servername = "localhost";
$username = "root";  // your MySQL username
$password = "";  // your MySQL password
$dbname = "carewell_clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
