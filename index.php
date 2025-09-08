<?php
session_start();

if (isset($_SESSION['Login']) != "true") {
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
    <script defer src="JS/index.js"></script>
</head>
<body>
<h2>Test</h2>
</body>
</html>