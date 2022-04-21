<?php

$dblocation = "localhost";
$dbuser = "root";
$dbpasswd = "";
$dbname = "cart";

$conn = new mysqli($dblocation, $dbuser,$dbpasswd);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully - Під’єднано успішно".'<br>';
$_SESSION['id']= 'id';

