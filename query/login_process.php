<?php
    session_start();
    include '../db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            header("location: ../dashboard.php");
        } else {
            header("location: ../login.php?error=1");
        }
    }
    $conn->close();
?>
