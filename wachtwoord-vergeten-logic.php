<?php
require_once('files/header.php');
require_once __DIR__ . "/files/functions.php";
require_once __DIR__ . "/vendor/autoload.php"; // PHPMailer

global $conn;

$email = $_POST["email"];

// Genereer token en hash
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Update gebruiker met reset token
$sql = "UPDATE users 
        SET reset_token_hash = ?, reset_token_expires_at = ? 
        WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

$success = false;
$error = "";

if ($stmt->affected_rows) {

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // SMTP instellingen
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mohammedkadour@gmail.com';
        $mail->Password   = 'thtk yhyk qseu gcxt';
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email
        $mail->setFrom('mohammedkadour@gmail.com', 'E-Shop');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Wachtwoord reset';

        $mail->Body = <<<END
<p>Klik op de knop hieronder om je wachtwoord te resetten:</p>
<p>
<a href="http://localhost/e-shop/reset-wachtwoord.php?token=$token" 
style="background:#0d6efd;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;">
Reset wachtwoord
</a>
</p>
END;

        $mail->send();
        $success = true;
    } catch (Exception $e) {
        $error = "Mail kon niet verstuurd worden. Probeer later opnieuw.";
    }
} else {
    $error = "Geen gebruiker gevonden met dit e-mailadres.";
}
?>

<div class="container py-4 py-lg-5 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">

                    <?php if ($success): ?>

                        <h2 class="h4 mb-3 text-success">Mail verzonden ✅</h2>

                        <p class="fs-sm text-muted mb-4">
                            We hebben een reset link gestuurd naar:<br>
                            <strong><?= htmlspecialchars($email) ?></strong>
                        </p>

                        <div class="text-end">
                            <a href="login.php" class="btn btn-primary">
                                Naar login
                            </a>
                        </div>

                    <?php else: ?>

                        <h2 class="h4 mb-3 text-danger">Fout ❌</h2>

                        <p class="fs-sm text-muted mb-4">
                            <?= htmlspecialchars($error) ?>
                        </p>

                        <div class="text-end">
                            <a href="wachtwoord-vergeten.php" class="btn btn-primary">
                                Probeer opnieuw
                            </a>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('files/footer.php'); ?>