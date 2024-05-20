<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Query Page</h2>

        <h3>a) Elenco dei film in catalogo ordinati per genere ed anno di produzione</h3>
        <?php
            include 'db_connect.php';

            $sql_a = "SELECT * FROM films ORDER BY genere, anno_produzione";
            $result_a = $conn->query($sql_a);

            if ($result_a->num_rows > 0) {
                echo "<ul>";
                while($row = $result_a->fetch_assoc()) {
                    echo "<li>" . $row['titolo'] . " (" . $row['genere'] . ", " . $row['anno_produzione'] . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "Nessun film nel catalogo.";
            }
        ?>
        
        <h3>b) Elenco in ordine alfabetico degli utenti che non hanno mai visualizzato alcun film</h3>
        <?php

        $sql_b = "SELECT username FROM users WHERE NOT EXISTS (SELECT * FROM visualizzazioni WHERE users.id = visualizzazioni.user_id)";
        $result_b = $conn->query($sql_b);

        if ($result_b->num_rows > 0) {
            echo "<ul>";
            while($row = $result_b->fetch_assoc()) echo "<li>" . $row['username'] . "</li>";
            echo "</ul>";
        } else {
            echo "Tutti gli utenti hanno visualizzato almeno un film.";
        }
        ?>

        <h3>c) Titolo del film con il maggior numero di visualizzazioni in un dato intervallo di tempo</h3>
        <form action="#" method="GET">
            <label for="anno">Inserisci l'anno:</label>
            <input type="number" id="anno" name="anno" min="1900" max="2099" required>
            <button type="submit">Cerca</button>
        </form>
        <?php
        if(isset($_GET['anno'])) {
            $anno = $_GET['anno'];
            
            $sql_c = "SELECT films.titolo FROM films 
                      INNER JOIN visualizzazioni ON films.id = visualizzazioni.film_id 
                      WHERE films.anno_produzione <= $anno 
                      GROUP BY films.titolo 
                      ORDER BY COUNT(*) DESC 
                      LIMIT 1";
            $result_c = $conn->query($sql_c);

            if ($result_c->num_rows > 0) {
                // Output del risultato
                $row = $result_c->fetch_assoc();
                echo "<p>Il film con il maggior numero di visualizzazioni è: " . $row['titolo'] . "</p>";
            } else {
                echo "Nessuna visualizzazione nell'anno $anno.";
            }
        }
        ?>

    </div>
</body>
</html>
