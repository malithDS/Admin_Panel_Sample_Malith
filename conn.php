<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "Sales";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("database connection unsuccessfull ". mysqli_error());
}

?>