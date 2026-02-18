<?php
// Start sessie als die nog niet gestart is
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Haal token uit de URL
if (!isset($_GET["token"]) || empty($_GET["token"])) {
    die("Geen token meegegeven.");
}

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

// Include database connectie
$mysqli = require __DIR__ . "/files/functions.php";

// Bereid de SQL statement voor
$sql = "SELECT * FROM users WHERE reset_token_hash = ?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Fout bij voorbereiden van query: " . $mysqli->error);
}

// Bind en execute
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Controleer of token bestaat
if ($user === null) {
    die("Token niet gevonden.");
}

// Controleer of token nog geldig is
if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token is verlopen.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reset Wachtwoord</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <h1>Reset Wachtwoord</h1>

    <form method="post" action="process-reset-wachtwoord.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">Nieuwe wachtwoord</label>
        <input type="password" id="password" name="password">

        <label for="password_confirmation">Herhaal wachtwoord</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button>Verzend</button>
    </form>

</body>

</html>