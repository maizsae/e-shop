<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define('BASE_URL', 'http://localhost/e-shop');
$conn = new mysqli('localhost','root','','e-shop');

function upload_images($files)
{
    ini_set('memory_limit', '512M');
    if ($files == null || empty($files)) {
        return [];
    }

    $uploaded_images = array(); 
    foreach ($files as $file) {
    print_r($file);

    if (
                isset($file['name']) &&
                isset($file['type']) &&
                isset($file['tmp_name']) &&
                isset($file['error']) &&
                isset($file['size'])
            ) {


            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $file_name = time() . "-" .rand(100000,1000000). "." . $ext;
                $destination = 'uploads/' . $file_name;
                $res = move_uploaded_file($file['tmp_name'], $destination);
                if(!$res){
                    
                    continue;

                }

                $img['src'] = $destination; 
                $uploaded_images[] = $img;

        


            
            }
    }

    

    return $uploaded_images;
}


function url($path = "/"){
    return BASE_URL . $path;
}   
function protected_area(){
    if(!isset($_SESSION['user'])){
        alert('warning','Ongeautoriseerde toegang, Log in voordat u verdergaat');
        header('Location: login.php');
        die();
    }
}

function logout(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
    }
    alert('succes','Uitgelogd');
    header('Location: login.php');
    die();
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

function text_input($data)
{
    $name = isset($data['name']) ? $data['name'] : "";
    $attributes = isset($data['attributes']) ? $data['attributes'] : "";

    // waarde
    $value = "";
    if(isset($_SESSION['form']['value'][$name])){
        $value = $_SESSION['form']['value'][$name];
    }

    // foutmelding
    $error_text = "";
    if(isset($_SESSION['form']['error'][$name])){
        $error_text = '<div class="form-text text-danger">' . $_SESSION['form']['error'][$name] . '</div>';
    }

    $label = isset($data['label']) ? $data['label'] : ucfirst($name);
    if(isset($data['value'])) $value = $data['value'];

    return '<label class="form-label text-capitalize" for="'. $name .'">'. $label .'</label>
            <input name="'.$name.'" value="'. $value .'" class="form-control" type="text" id="'.$name.'" placeholder="'.$name.'" '.$attributes.'>
            ' . $error_text;
}


