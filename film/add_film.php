<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titolo = $_POST['titolo'];
    $anno_produzione = $_POST['anno_produzione'];
    $genere = $_POST['genere'];
    $attori_principali = $_POST['attori_principali'];
    $trama = $_POST['trama'];
    $durata = $_POST['durata'];
    $cover_image = $_POST['cover_image'];

    $sql = "INSERT INTO films (titolo, anno_produzione, genere, attori_principali, trama, durata, cover_image) 
            VALUES ('$titolo', '$anno_produzione', '$genere', '$attori_principali', '$trama', '$durata', '$cover_image')";

    if ($conn->query($sql) === TRUE) {
        header("location: ../film_management.php?success=1");
        exit();
    else echo "Errore: " . $sql . "<br>" . $conn->error;
    
}

$conn->close();
?>
