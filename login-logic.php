<?php 
require_once('files/functions.php');
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if( login_user($email,$password) ){

alert('success','Login is succesvol.');
     header('Location: account-bestellingen.php'); 
     die();

}else{
        alert('danger','Je hebt de verkeerde gebruikersnaam of wachtwoord ingevoerd');
        header('Location: login.php');
    die();
}
// voert de query uit en logt de gebruiker in als het lukt
// redirect de gebruiker terug als het niet lukt 
