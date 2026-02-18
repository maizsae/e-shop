<?php
require_once __DIR__ . "/files/functions.php";
require_once __DIR__ . "/vendor/autoload.php"; // PHPMailer autoload

$email = $_POST["email"];

// Genereer token en hash
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Update gebruiker met reset token
$sql = "UPDATE users SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($stmt->affected_rows) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // SMTP instellingen voor Gmail
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mohammedkadour@gmail.com';
        $mail->Password   = 'thtk yhyk qseu gcxt'; // Gmail app password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email inhoud
        $mail->setFrom('mohammedkadour@gmail.com', 'E-Shop');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Wachtwoord reset';
        $mail->Body = <<<END
Klik <a href="http://localhost/e-shop/reset-wachtwoord.php?token=$token">hier</a> 
om je wachtwoord te resetten.
END;

        $mail->send();
        echo "Mail is verstuurd, bekijk je inbox.";
    } catch (Exception $e) {
        echo "Mail kon niet verstuurd worden. Mailer error: {$mail->ErrorInfo}";
    }
} else {
    echo "Geen gebruiker gevonden met dit e-mailadres.";
}
