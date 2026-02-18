<?php
/**
 * Script om een admin gebruiker aan te maken
 * 
 * BELANGRIJK: Verwijder dit bestand na gebruik voor veiligheid!
 * 
 * Gebruik:
 * 1. Ga naar: http://localhost/e-shop/admin/create-admin.php
 * 2. Vul het formulier in
 * 3. Verwijder dit bestand daarna!
 */

require_once('../files/functions.php');

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);
    
    // Validatie
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $error = 'Alle velden zijn verplicht!';
    } elseif ($password !== $password_confirm) {
        $error = 'Wachtwoorden komen niet overeen!';
    } elseif (strlen($password) < 6) {
        $error = 'Wachtwoord moet minimaal 6 tekens lang zijn!';
    } else {
        // Controleer of email al bestaat
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $res = $conn->query($sql);
        
        if ($res->num_rows > 0) {
            // Update bestaande gebruiker naar admin
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET 
                    first_name = '{$first_name}',
                    last_name = '{$last_name}',
                    password = '{$password_hash}',
                    user_type = 'admin'
                    WHERE email = '{$email}'";
            
            if ($conn->query($sql)) {
                $message = 'Bestaande gebruiker is succesvol bijgewerkt naar admin!';
            } else {
                $error = 'Fout bij bijwerken: ' . $conn->error;
            }
        } else {
            // Maak nieuwe admin gebruiker aan
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $created = time();
            
            $sql = "INSERT INTO users (
                first_name,
                last_name,
                email,
                password,
                user_type,
                created
            ) VALUES (
                '{$first_name}',
                '{$last_name}',
                '{$email}',
                '{$password_hash}',
                'admin',
                '{$created}'
            )";
            
            if ($conn->query($sql)) {
                $message = 'Admin gebruiker is succesvol aangemaakt! Je kunt nu inloggen met: ' . htmlspecialchars($email);
            } else {
                $error = 'Fout bij aanmaken: ' . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Account Aanmaken</title>
    <link rel="stylesheet" href="../css/theme.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px 0;
        }
        .admin-form-container {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-form-container">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">⚠️ Admin Account Aanmaken</h4>
                </div>
                <div class="card-body">
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
                    <?php endif; ?>
                    
                    <?php if ($message): ?>
                        <div class="alert alert-success">
                            <?= $message; ?>
                            <hr>
                            <a href="../login.php" class="btn btn-primary">Ga naar Login</a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <strong>Let op:</strong> Verwijder dit bestand na gebruik voor veiligheid!
                        </div>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Voornaam</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Achternaam</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                                <small class="text-muted">Als deze email al bestaat, wordt de gebruiker bijgewerkt naar admin.</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Wachtwoord</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Bevestig Wachtwoord</label>
                                <input type="password" name="password_confirm" class="form-control" required minlength="6">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Admin Account Aanmaken</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="text-center mt-3">
                <a href="../login.php" class="text-muted">Terug naar Login</a>
            </div>
        </div>
    </div>
</body>
</html>
