<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1) echo "<p class='success-message'>Film guardato correttamente!</p>"; ?>
        <?php
        session_start();
        if(isset($_SESSION['username'])) {
            include 'db_connect.php';


            $sql = "SELECT * FROM films";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    echo "<div class='film-card'>";
                    echo "<img src='" . $row['cover_image'] . ".png' alt='" . $row['titolo'] . "' class='cover'>";
                    echo "<div class='film-info'>";
                    echo "<h3>" . $row['titolo'] . "</h3>";
                    echo "<p><strong>Anno di Produzione:</strong> " . $row['anno_produzione'] . "</p>";
                    echo "<p><strong>Genere:</strong> " . $row['genere'] . "</p>";
                    echo "<p><strong>Attori Principali:</strong> " . $row['attori_principali'] . "</p>";
                    echo "<p><strong>Trama:</strong> " . $row['trama'] . "</p>";
                    echo "<p><strong>Durata:</strong> " . $row['durata'] . " minuti</p>";
                    echo "<form action='./film/watch_film.php' method='POST'>";
                    echo "<input type='hidden' name='film_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='btn'>Guarda il film!</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Nessun film nel catalogo.</p>";
            }
            $conn->close();
        } else {
            echo "<p>Devi effettuare il login per accedere alla dashboard.</p>";
        }
        ?>
        <a href="film_management.php" class="btn">Aggiorna catalogo film</a>
    </div>
</body>
</html>
