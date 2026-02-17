<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define('BASE_URL', 'http://localhost/e-shop');
$conn = new mysqli('localhost','root','','e-shop');

function url($path = "/"){
    return BASE_URL . $path;
}   
function is_logged_in(){
    if(isset($_SESSION['user'])){
        return true;
    }else{
         return false;
    }
}

function alert($type,$message){
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}
//functie om een  gebruiker in te loggen  
function login_user($email,$password)
{ 
    global $conn;

    $sql = "SELECT * FROM users WHERE email ='{$email}'"; // haalt gebruiker op
    $res = $conn->query($sql); 

    if($res->num_rows < 1){
        return false;
    }

    $row = $res->fetch_assoc();     

    if(!password_verify($password, $row['password'])) { // controleert of wachtwoord overeenkomt met gehaste wachtwoord
        return false;
    }
    $_SESSION['user'] = $row; // sla gebruiker op in een sessie
     return true;
}

