<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active bg-primary' : ''; ?>" href="index.php">
            <i class="ci-dashboard opacity-75 me-2"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'categorieen.php' || basename($_SERVER['PHP_SELF']) == 'add-categorie.php') ? 'active bg-primary' : ''; ?>" href="categorieen.php">
            <i class="ci-folder opacity-75 me-2"></i>
            Categorieën
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white <?= (basename($_SERVER['PHP_SELF']) == 'add-categorie.php') ? 'active bg-primary' : ''; ?>" href="add-categorie.php">
            <i class="ci-plus-circle opacity-75 me-2"></i>
            Nieuwe Categorie
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="producten.php">
            <i class="ci-shopping-bag opacity-75 me-2"></i>
            Producten
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="bestellingen.php">
            <i class="ci-cart opacity-75 me-2"></i>
            Bestellingen
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="gebruikers.php">
            <i class="ci-user opacity-75 me-2"></i>
            Gebruikers
        </a>
    </li>
    <li class="nav-item mt-3">
        <hr class="text-white-50">
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="../index.php" target="_blank">
            <i class="ci-home opacity-75 me-2"></i>
            Naar Website
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="../logout.php">
            <i class="ci-sign-out opacity-75 me-2"></i>
            Uitloggen
        </a>
    </li>
</ul>
