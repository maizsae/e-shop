# Admin Panel - E-Shop

Dit is het admin panel voor het beheren van de E-Shop.

## Toegang

Om toegang te krijgen tot het admin panel moet je:
1. Ingelogd zijn als gebruiker
2. Het `user_type` veld in de database moet op `admin` staan

## Admin Gebruiker Aanmaken

Om een admin gebruiker aan te maken, voer je de volgende SQL query uit in je database:

```sql
UPDATE users SET user_type = 'admin' WHERE email = 'jouw-email@voorbeeld.nl';
```

Of maak een nieuwe admin gebruiker aan:

```sql
INSERT INTO users (first_name, last_name, email, password, user_type, created) 
VALUES ('Admin', 'Gebruiker', 'admin@voorbeeld.nl', '$2y$10$...', 'admin', UNIX_TIMESTAMP());
```

## Beschikbare Pagina's

- **Dashboard** (`index.php`) - Overzicht van statistieken
- **Categorieën** (`categorieen.php`) - Beheer alle categorieën
- **Nieuwe Categorie** (`add-categorie.php`) - Voeg een nieuwe categorie toe
- **Producten** (`producten.php`) - Beheer alle producten
- **Bestellingen** (`bestellingen.php`) - Bekijk alle bestellingen
- **Gebruikers** (`gebruikers.php`) - Beheer alle gebruikers

## Structuur

```
admin/
├── index.php          # Dashboard
├── header.php         # Admin header met sidebar
├── footer.php         # Admin footer
├── sidebar.php        # Navigatie menu
├── categorieen.php    # Categorie overzicht
├── add-categorie.php  # Nieuwe categorie toevoegen
├── producten.php      # Product overzicht
├── bestellingen.php   # Bestelling overzicht
└── gebruikers.php     # Gebruiker overzicht
```

## Beveiliging

Het admin panel gebruikt de `admin_protected_area()` functie die:
- Controleert of de gebruiker ingelogd is
- Controleert of de gebruiker admin rechten heeft
- Redirect naar login of homepage als er geen toegang is

## Styling

Het admin panel gebruikt dezelfde CSS als de hoofdsite, maar met een aangepaste layout voor een betere admin ervaring.
