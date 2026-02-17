<?php 
require_once('files/functions.php');
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);


if ($password != $password_1){
    die("wachtwoord komt niet overeen");
}

$sql = "SELECT * FROM users WHERE email ='{$email}'";
$res =$conn->query($sql);

if($res->num_rows > 0){
    die("Een gebruiker met dezelfde email bestaat al.");
}
$password = password_hash($password,PASSWORD_DEFAULT);
die($password);
$sql = "INSERT INTO users (
       first_name,
       last_name,
       phone_number,
       password,
       email,
       user_type
)";

echo "<pre>";
print_r($_POST);    