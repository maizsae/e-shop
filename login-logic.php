<?php 
require_once('files/functions.php');
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);


// controleert of wachtwoord overeenkomt
if ($password != $password_1){
    die("wachtwoord komt niet overeen");
}

$sql = "SELECT * FROM users WHERE email ='{$email}'"; //controleert of er al een gebruiker bestaat met zelfde email 
$res =$conn->query($sql);

if($res->num_rows > 0){
    die("Een gebruiker met dezelfde email bestaat al.");
}
$password = password_hash($password,PASSWORD_DEFAULT); // hash het wachtwoord voor veiligheid 
$created = time();

$sql = "INSERT INTO users (
       first_name,
       last_name,
       phone_number,
       password,
       email,
       user_type,
        created
) VALUES(
      '{$first_name}',
      '{$last_name}',
      '{$phone_number}',
      '{$password}',
      '{$email}',
      'klant',
      '{$created}'
)";
// voert de query uit en logt de gebruiker in als het lukt 
if($conn->query($sql)){
    login_user($email,$password);
    header('Location: your_redirect_page.php'); 
}else{
    die("Kon geen account aanmaken");   
}


die();