<?php
require_once('files/functions.php');
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (login_user($email, $password)) {

    alert('success', 'Login is succesvol.');

    // Admin -> naar admin producten
    if (!empty($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] === 'admin') {
        header('Location: admin-producten.php');
    } else {
        header('Location: account-bestellingen.php');
    }
    die();
} else {
    alert('danger', 'Je hebt de verkeerde gebruikersnaam of wachtwoord ingevoerd');
    header('Location: login.php');
    die();
}
