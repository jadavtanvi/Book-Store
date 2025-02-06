<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$dbname = "php_project";
$con = mysqli_connect($host, $user, $pass, $dbname);
if (!$con) {
    die("Connection fail" . mysqli_connect_error());
}
