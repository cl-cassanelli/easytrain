<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <form action="./query/register_process.php" method="POST">
            <h2>Registrazione</h2>
            <?php if(isset($_GET['error']) && $_GET['error'] == 1) echo "<p style='color:red;'>Errore durante la registrazione. Riprova più tardi.</p>"; ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Registrati</button>
            <p>Hai già un account? <a href="login.php">Accedi</a></p>
        </form>
    </div>
</body>
</html>
