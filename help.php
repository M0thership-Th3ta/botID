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
    <title>Help</title>
    <link href="CSS/style.css" rel="stylesheet">
    <script defer src="JS/menu.js"></script>
</head>
<body>
<nav id="menu"></nav>
<header>
    <h1>BotID</h1>
</header>
<main>
    <h2>Help</h2>
    <p>Komt er nog aan!</p>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>
