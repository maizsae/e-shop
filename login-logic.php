<?php 
require_once('files/functions.php');
$email = trim($_POST['email']);
$sql = "SELECT * FROM users WHERE email ='{$email}'";
die ($sql);
echo "<pre>";
print_r($_POST);