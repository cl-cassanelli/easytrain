<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $film_id = $_POST['film_id'];

    $sql = "DELETE FROM films WHERE id = '$film_id'";

    if ($conn->query($sql) === TRUE) {
        header("location: ../film_management.php?success=1");
        exit();
    } else echo "Errore: " . $sql . "<br>" . $conn->error;
    
}

$conn->close();
?>
