<?php
require_once('files/header.php');
require_once __DIR__ . "/files/functions.php"; // <-- belangrijk: require_once

// gebruik de bestaande connectie uit functions.php
global $conn;
$mysqli = $conn;

if (!isset($_GET["token"]) || empty($_GET["token"])) {
    die("Geen token meegegeven");
}

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("token niet gevonden");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("token is verlopen");
}
?>

<div class="container py-4 py-lg-5 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">

                    <h2 class="h4 mb-3">Wachtwoord opnieuw instellen</h2>
                    <p class="fs-sm text-muted mb-4">
                        Kies een nieuw wachtwoord en bevestig deze.
                    </p>

                    <form action="process-reset-wachtwoord.php" method="post">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                        <div class="mb-3">
                            <label class="form-label" for="password">Nieuw wachtwoord</label>
                            <input class="form-control" type="password" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Herhaal wachtwoord</label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="text-end pt-3">
                            <button class="btn btn-primary" type="submit">
                                Wachtwoord opslaan
                            </button>
                        </div>
                    </form>

                    <hr class="my-4">
                    <div class="text-center">
                        <a href="login.php" class="fs-sm">Terug naar login</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('files/footer.php'); ?>