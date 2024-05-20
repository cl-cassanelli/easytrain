<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <form action="./query/login_process.php" method="POST">
            <h2>Login</h2>

            <?php if(isset($_GET['error']) && $_GET['error'] == 1) echo "<p style='color:red;'>Username o password errati.</p>"; ?>
            
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Accedi</button>
            <p>Non hai un account? <a href="register.php">Registrati</a></p>
        </form>
        <form action="./query/logout.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
