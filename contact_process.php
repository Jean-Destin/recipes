<?php
    //referencing the connection file db.php
    include 'db.php';
    if(isset($_POST['email']) && isset($_POST['message'])){
    $email=$conn->real_escape_string($_POST['email']);
    $message=$conn->real_escape_string($_POST['message']);
    $sql="INSERT INTO contact(email,message) VALUES('$email','$message')";
    $conn->query($sql);
 }

?>