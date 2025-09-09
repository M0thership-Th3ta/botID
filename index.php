<?php
session_start();

//Ben ik ingelogd?
if (isset($_SESSION['Login'])) {
    $name = $_SESSION['name'];
}
//Haal ID gegevens op
//Toon gegevens properly in HTML
//Zo nee?
//Redirect Naar login pagina

else if (isset($_SESSION['Login']) != "true") {
    header('location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>BotID</title>
    <link href="CSS/style.css" rel="stylesheet">
    <script defer src="JS/menu.js"></script>
</head>
<body>
<header>
    <h1>BotID</h1>
</header>
<main>
    <h2>Welcome <?= htmlentities($name) ?>!</h2>
    <div class="identification"></div>
    <a href="logout.php">Logout</a>
    <nav>

    </nav>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>