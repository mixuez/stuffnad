<?php

$hostname = "localhost";
$username = "root";
$password ="";
$database ="db_perpustakaan";

$con = mysqli_connect($hostname, $username, $password, $database);

if($con->connect_error){
    die(mysqli_connect_error());
}


?>