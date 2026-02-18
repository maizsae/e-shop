# Hoe inloggen met een Admin Account

## Stap 1: Admin Account Aanmaken

Je hebt twee opties om een admin account aan te maken:

### Optie A: Via het Admin Aanmaak Script (Eenvoudigst)

1. Ga naar: `http://localhost/e-shop/admin/create-admin.php`
2. Vul het formulier in:
   - Voornaam
   - Achternaam  
   - Email (dit wordt je login email)
   - Wachtwoord (minimaal 6 tekens)
   - Bevestig wachtwoord
3. Klik op "Admin Account Aanmaken"
4. **BELANGRIJK:** Verwijder daarna het bestand `admin/create-admin.php` voor veiligheid!

### Optie B: Via Database (SQL)

Open je database (bijvoorbeeld via phpMyAdmin) en voer een van deze queries uit:

**Bestaande gebruiker admin maken:**
```sql
UPDATE users SET user_type = 'admin' WHERE email = 'jouw-email@voorbeeld.nl';
```

**Nieuwe admin gebruiker aanmaken:**
```sql
INSERT INTO users (first_name, last_name, email, password, user_type, created) 
VALUES (
    'Admin', 
    'Gebruiker', 
    'admin@voorbeeld.nl', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'admin', 
    UNIX_TIMESTAMP()
);
```

**Let op:** Als je een nieuwe gebruiker aanmaakt via SQL, moet je het wachtwoord eerst hashen. Gebruik liever Optie A (het script) of maak eerst een normale gebruiker aan via de registratie pagina en maak die daarna admin.

## Stap 2: Inloggen

1. Ga naar: `http://localhost/e-shop/login.php`
2. Vul je admin email en wachtwoord in
3. Klik op "Aanmelden"
4. Je wordt automatisch doorgestuurd naar het admin panel: `http://localhost/e-shop/admin/`

## Direct naar Admin Panel

Als je al ingelogd bent als admin, kun je direct naar:
- `http://localhost/e-shop/admin/`
- `http://localhost/e-shop/admin/index.php`

## Problemen?

- **Kan niet inloggen?** Controleer of je email en wachtwoord correct zijn
- **Geen toegang tot admin panel?** Controleer of `user_type` in de database op `admin` staat
- **Wordt doorgestuurd naar account-bestellingen.php?** Je account heeft waarschijnlijk geen admin rechten. Controleer de database.

## Veiligheid

- Verwijder `admin/create-admin.php` na gebruik
- Gebruik een sterk wachtwoord voor admin accounts
- Beperk het aantal admin accounts
