<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "dbcrud";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die ("Could not connect to: " . mysqli_connect_error());
} else {
}


?>