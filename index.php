<?php
session_start();

if (isset($_SESSION['Login'])) {
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $birthDate = $_SESSION['birthDate'];
    $bsn = $_SESSION['bsn'];
} else if (isset($_SESSION['Login']) != "true") {
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
<nav id="menu">
</nav>
<header>
    <h1>BotID</h1>
</header>
<main>
    <h2>Welcome <?= htmlentities($first_name) ?>!</h2>
    <div class="identification">
        <div class="image-container">
            <img alt="Profile Picture" src="includes/images/blank-card.png">
        </div>
        <div class="identification-information">
            <p>Name: <?= htmlentities($first_name . ' ' . $last_name) ?></p>
            <p>Birth Date: <?= $birthDate ?></p>
            <p>BSN: <?= htmlentities($bsn) ?></p>
        </div>
    </div>
    <h2>U bent niet een bot.</h2>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>