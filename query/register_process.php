<?php
include '../db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        

        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

        if ($conn->query($sql)) header("location: ../login.php");
        else header("location: ../register.php?error=1");
        
    }
$conn->close();
?>
