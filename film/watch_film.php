<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['film_id'])) {
    session_start();
    $username = $_SESSION['username'];
    $film_id = $_POST['film_id'];
    
        $sql_insert_view = "INSERT INTO visualizzazioni (user_id, film_id) 
                            VALUES ((SELECT id FROM users WHERE username = '$username'), $film_id)";
        if ($conn->query($sql_insert_view) === TRUE) {
            header("location: ../dashboard.php?success=1");
            exit();
        } else {
            echo "Errore nella registrazione della visualizzazione: " . $conn->error;
        }
    
} else {
    header("location: ../dashboard.php");
    exit();
}

$conn->close();
?>
