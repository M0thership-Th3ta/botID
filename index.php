<?php
session_start();

//Ben ik ingelogd?
//Zo ja?
//Haal ID gegevens op
//Toon gegevens properly in HTML
//Zo nee?
//Redirect Naar login pagina

//if (isset($_SESSION['Login']) != "true") {
//header('location: login.php');
//exit;
//}

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
    <script defer src="JS/index.js"></script>
</head>
<body>
<header>
    <nav>

    </nav>
</header>
<main>
    <h1>Welcome !</h1>
    <div class="identification"></div>
    <a href="logout.php">Logout</a>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>