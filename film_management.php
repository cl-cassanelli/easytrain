<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Film</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Gestione Film</h2>

        <?php if (isset($_GET['success']) && $_GET['success'] == 1) echo "<p class='success-message'>Operazione completata con successo!</p>"; ?>
        
        <!-- Form per l'aggiunta di un nuovo film -->
        <h3>Aggiungi Nuovo Film</h3>
        <form action="film/add_film.php" method="POST">
            <label for="titolo">Titolo:</label><input type="text" id="titolo" name="titolo" required>

            <label for="anno_produzione">Anno di Produzione:</label><input type="number" name="anno_produzione" required>

            <label for="genere">Genere:</label><input type="text" name="genere" required><br>

            <label for="attori_principali">Attori Principali:</label><input type="text" name="attori_principali" required><br>

            <label for="attori_principali">Trama:</label><input type="text" name="trama" required><br>

            <label for="attori_principali">Durata:</label><input type="text" name="durata" required><br>

            <label for="cover_image">URL dell'Immagine di Copertina:</label><input type="text" name="cover_image" required><br>

            <button type="submit">Aggiungi Film</button>
        </form>
        
        <hr>
        
        <!-- Form per la rimozione di un film -->
        <h3>Rimuovi Film</h3>
        <form action="film/remove_film.php" method="POST">
            <label for="film_id">Seleziona il Film da Rimuovere:</label>
            <select id="film_id" name="film_id" required>
                <option value="" disabled selected>Scegli il film</option>
                <?php
                    $sql = "SELECT id, titolo FROM films";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) echo "<option value='" . $row['id'] . "'>" . $row['titolo'] . "</option>";
                    } else echo "<option disabled>Nessun film nel catalogo</option>";
                    
                    $conn->close();
                ?>
            </select><br>
            <button type="submit">Rimuovi Film</button>
        </form>
        <a href="dashboard.php" class="btn">Visualizza catalogo film</a>
    </div>
    
</body>
</html>
