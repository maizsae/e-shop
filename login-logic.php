<?php 
require_once('files/functions.php');
$email = trim($_POST['email']);
$sql = "SELECT * FROM users WHERE email ='{$email}'";
$res =$conn->query($sql);

if($res->num_rows > 0){
    die("Een gebruiker met dezelfde email bestaat al.");
}

echo "<pre>";
print_r($_POST);