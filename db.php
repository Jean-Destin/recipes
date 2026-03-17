<?php 
// intializing  connection detail
    $host="localhost";
    $user= "root";
    $pass= "";
    $dbname="test";
// connection of the database
    $conn = new mysqli($host,$user,$pass,$dbname);
//verifying connection
    if ($conn->connect_error) {
        die("connection failed". $conn->connect_error);
    }

?>
