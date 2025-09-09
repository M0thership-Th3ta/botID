<?php
/** @var mysqli $db */

require_once 'includes/connection.php';
session_start();
$login = false;

if (isset($_POST['submit'])) {

    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);

    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Uw email is verplicht';
    }
    if ($password == '') {
        $errors['password'] = 'uw wachtwoord is verplicht';
    }
    if (empty($errors)) {
        $query = "
       SELECT 'email' FROM users WHERE `email` = '$email'
       ";
        $result = mysqli_query($db, $query)
        or die('Error: ' . mysqli_error($db) . 'with query ' . $query);

        if (mysqli_num_rows($result) == 1) {
            $query = "
        SELECT * FROM `users` WHERE `email` = '$email'
        ";
            $result = mysqli_query($db, $query)
            or die('Error: ' . mysqli_error($db) . 'with query ' . $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $users = $row;
            }

        } else {
            $errors['loginFailed'] = 'Login failed';
        }
        if (empty($errors)) {
            if (password_verify($password, $users['password']) == true) {
                $_SESSION['Login'] = true;
                $_SESSION['email'] = $users['email'];
                $_SESSION['first_name'] = $users['first_name'];
                $_SESSION['last_name'] = $users['last_name'];
                $_SESSION['birthDate'] = $users['birthDate'];
                $_SESSION['bsn'] = $users['bsn'];
                $_SESSION['admin'] = $users['admin'];
                header('location: index.php');
                exit();
            } else {
                $errors['loginFailed'] = 'Uw logininformatie in niet correct';
            }
        }
    }
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
    <title>Login</title>
</head>
<body>
<header>
    <h2>Login</h2>
</header>
<form action="" method="post">
    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="<?= htmlentities($email ?? '') ?>">
    <p class="error">
        <?= $errors['email'] ?? '' ?>
    </p>
    <label for="password">Wachtwoord</label>
    <input id="password" type="password" name="password">
    <p class="error">
        <?= $errors['password'] ?? '' ?>
    </p>

    <p class="error">
        <?= $errors['loginFailed'] ?? '' ?>
    </p>

    <button class="button" type="submit" name="submit">Login</button>
    <p class="textStyle">
        Nog geen account?
    </p>
    <a href="registry.php">Registreren</a>
</form>
</body>
</html>