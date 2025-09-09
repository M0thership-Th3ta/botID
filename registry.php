<?php
/** @var mysqli $db */
require_once 'includes/connection.php';
session_start();
$login = false;

if (isset($_SESSION['Login'])) {
    header('location: logout.php');
    exit;
}

if (isset($_POST['submit'])) {
    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $birthDate = mysqli_escape_string($db, $_POST['birthDate']);
    $bsn = mysqli_escape_string($db, $_POST['bsn']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);
    $dubblePassword = mysqli_escape_string($db, $_POST['passwordCheck']);

    $errors = [];
    if (strlen($firstName) > 50) {
        $errors['firstName'] = 'Uw voornaam mag niet langer dan 50 letters zijn';
    }
    if ($firstName == '') {
        $errors['firstName'] = 'Uw voornaam is verplicht';
    }
    if ($lastName == '') {
        $errors['lastName'] = 'Uw achternaam is verplicht';
    }
    if (strlen($lastName) > 50) {
        $errors['lastName'] = 'Uw achternaam mag niet langer dan 50 letters zijn';
    }
    if ($birthDate == '') {
        $errors['birthDate'] = 'Uw geboortedatum is verplicht';
    }
    if (!is_numeric($bsn)) {
        $errors['bsn'] = 'Uw bsn mag alleen nummers bevatten';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Dit email bestaat niet';
    }
    if ($email == '') {
        $errors['email'] = 'Uw email is verplicht';
    }
    if ($dubblePassword == '') {
        $errors['passwordCheck'] = 'U moet uw wachtwoord opnieuw invullen!';
    }
    if ($password !== $dubblePassword) {
        $errors['dubblePassword'] = 'Uw wachtwoord komt niet overeen!';
    }
    if ($password == '') {
        $errors['password'] = 'Uw wachtwoord is verplicht';
    }

    $sql = " SELECT `email`  FROM users WHERE `email` = '$email'";
    $result = mysqli_query($db, $sql)
    or die('Error ' . mysqli_error($db) . 'with query ' . $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['dubbleMail'] = 'Dit email is al gebruikt';
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "
    INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `date_of_birth`, `bsn`, `admin`)
    VALUES ('$firstName','$lastName','$email', '$password', '$birthDate', $bsn, 0)
    ";
        $result = mysqli_query($db, $query)
        or die('Error ' . mysqli_error($db) . 'with query ' . $query);

        header('location: login.php');
        exit;
    };
}

mysqli_close($db);


//Email
//Password
//Verify Password
//Naam
//Achternaam
//Geboortedatum
//BSN
//Pasfoto
//Gender?
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="firstName">Voornaam</label>
    <input id="firstName" type="text" name="firstName" value="<?= htmlentities($firstName ?? '') ?>">
    <p class="error">
        <?= $errors['firstName'] ?? '' ?>
    </p>

    <label for="lastName">Achternaam</label>
    <input id="lastName" type="text" name="lastName" value="<?= htmlentities($lastName ?? '') ?>">
    <p class="error">
        <?= $errors['lastName'] ?? '' ?>
    </p>

    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="<?= htmlentities($email ?? '') ?>">
    <p class="error">
        <?= $errors['email'] ?? '' ?>
        <?= $errors['dubbleMail'] ?? '' ?>
    </p>

    <label for="birthDate">Geboortedatum</label>
    <input type="date" name="birthDate" value="<?= htmlentities($birthDate ?? '') ?>">
    <p class="error">
        <?= $errors['birthDate'] ?? '' ?>
    </p>

    <label for="bsn">Bsn</label>
    <input id="bsn" type="text" name="bsn" value="<?= htmlentities($bsn ?? '') ?>">
    <p class="error">
        <?= $errors['bsn'] ?? '' ?>
    </p>

    <label for="password">Wachtwoord</label>
    <input id="password" type="password" name="password">
    <p class="error">
        <?= $errors['password'] ?? '' ?>
    </p>

    <label for="passwordCheck">Herhaal wachtwoord</label>
    <input id="passwordCheck" type="password" name="passwordCheck">
    <p class="error">
        <?= $errors['dubblePassword'] ?? '' ?>
        <?= $errors['passwordCheck'] ?? '' ?>
    </p>

    <div class="registerStyle">
        <button class="button" type="submit" name="submit">Registreren</button>
    </div>
</form>
</body>
</html>
