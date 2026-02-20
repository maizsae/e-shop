<?php
require_once('files/header.php');
require_once __DIR__ . "/files/functions.php";

global $conn;
$mysqli = $conn;

$success = false;
$error = "";

// Token ophalen
if (!isset($_POST["token"]) || empty($_POST["token"])) {
    $error = "Ongeldige reset link.";
} else {

    $token = $_POST["token"];
    $token_hash = hash("sha256", $token);

    $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $token_hash);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user === null) {
        $error = "Token niet gevonden.";
    } elseif (strtotime($user["reset_token_expires_at"]) <= time()) {
        $error = "Token is verlopen.";
    } elseif (strlen($_POST["password"]) < 8) {
        $error = "Wachtwoord moet minimaal 8 tekens zijn.";
    } elseif (!preg_match("/[a-z]/i", $_POST["password"])) {
        $error = "Wachtwoord moet minimaal één letter bevatten.";
    } elseif (!preg_match("/[0-9]/", $_POST["password"])) {
        $error = "Wachtwoord moet minimaal één cijfer bevatten.";
    } elseif ($_POST["password"] !== $_POST["password_confirmation"]) {
        $error = "Wachtwoorden komen niet overeen.";
    } else {

        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "UPDATE users
                SET password = ?,
                    reset_token_hash = NULL,
                    reset_token_expires_at = NULL
                WHERE id = ?";

        $stmt = $mysqli->prepare($sql);

        // id is integer -> si
        $stmt->bind_param("si", $password_hash, $user["id"]);
        $stmt->execute();

        $success = true;
    }
}
?>

<div class="container py-4 py-lg-5 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">

                    <?php if ($success): ?>

                        <h2 class="h4 mb-3 text-success">Wachtwoord aangepast ✅</h2>

                        <p class="fs-sm text-muted mb-4">
                            Je wachtwoord is succesvol gewijzigd.
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
                                Opnieuw proberen
                            </a>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('files/footer.php'); ?>