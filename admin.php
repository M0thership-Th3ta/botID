<?php
/** @var mysqli $db */

require_once 'includes/connection.php';
session_start();

if (isset($_SESSION['Login'])) {
    if ($_SESSION['admin'] === 0) {
        header('location: login.php');
        exit;
    } else {
        $query = "SELECT * FROM users";

        $result = mysqli_query($db, $query)
        or die('Error ' . mysqli_error($db) . ' with query ' . $query);

        $users = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
} else if (isset($_SESSION['Login']) != "true") {
    header('location: login.php');
    exit;
}

mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="CSS/style.css" rel="stylesheet">
    <script defer src="JS/menu.js"></script>
</head>
<body>
<nav id="menu"></nav>
<header>
    <h1>BotID</h1>
</header>
<main>
    <h2>Adminpagina</h2>
    <table class="users">
        <tbody>
        <?php foreach ($users as $index => $users) { ?>
            <tr>
                <td><?= htmlentities($index + 1) ?? ''; ?></td>
                <td><?= htmlentities($users['first_name'] ?? ''); ?></td>
                <td><?= htmlentities($users['last_name'] ?? ''); ?></td>
                <td><?= htmlentities($users['email'] ?? ''); ?></td>
                <td><?= htmlentities($users['bsn'] ?? ''); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>
<footer>
    <p>© 2024 BotID. All rights reserved.</p>
</footer>
</body>
</html>
