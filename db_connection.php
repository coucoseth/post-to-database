<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "posts";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}