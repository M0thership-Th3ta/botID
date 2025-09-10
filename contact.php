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
    <title>Contact</title>
    <link href="CSS/style.css" rel="stylesheet">
    <link href="CSS/login.css" rel="stylesheet">
    <script defer src="JS/menu.js"></script>
</head>
<body>
<nav id="menu"></nav>
<header>
    <h1>BotID</h1>
</header>
<main>
    <h2>Contact</h2>
    <form action="" method="post">
        <div>
            <label for="name">Naam:</label>
            <input id="name" type="text" name="name" value="">
        </div>

        <div>
            <label for="email">E-mail:</label>
            <input id="email" type="email" name="email" value="">
        </div>

        <div>
            <label for="subject">Onderwerp:</label>
            <input id="subject" type="text" name="subject" value="">
        </div>

        <div>
            <label for="question">Vraag/opmerking:</label>
            <textarea name="question" rows="7" cols="30"></textarea>
        </div>

        <div>
            <button class="button" type="submit" name="submit">Versturen</button>
        </div>
    </form>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>
