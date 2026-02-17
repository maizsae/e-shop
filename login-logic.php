<?php 
require_once('files/functions.php');
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if( login_user($email,$password) ){

die("succes!");

}else{
    die("mislukt");
}
// voert de query uit en logt de gebruiker in als het lukt 
