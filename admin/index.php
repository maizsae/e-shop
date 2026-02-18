<?php
$page_title = 'Dashboard';
require_once('header.php');
?>

<div class="row">
    <!-- Statistics Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Totaal Bestellingen
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $orders = db_select('orders');
                            echo count($orders);
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="ci-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Totaal Producten
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $products = db_select('products');
                            echo count($products);
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="ci-shopping-bag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Totaal Gebruikers
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $users = db_select('users');
                            echo count($users);
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="ci-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Totaal Categorieën
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $categories = db_select('categories');
                            echo count($categories);
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="ci-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row mt-4">
    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Snelle Acties</h6>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="add-categorie.php" class="list-group-item list-group-item-action">
                        <i class="ci-plus-circle me-2"></i> Nieuwe Categorie Toevoegen
                    </a>
                    <a href="producten.php" class="list-group-item list-group-item-action">
                        <i class="ci-shopping-bag me-2"></i> Producten Beheren
                    </a>
                    <a href="bestellingen.php" class="list-group-item list-group-item-action">
                        <i class="ci-cart me-2"></i> Bestellingen Bekijken
                    </a>
                    <a href="gebruikers.php" class="list-group-item list-group-item-action">
                        <i class="ci-user me-2"></i> Gebruikers Beheren
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Welkom</h6>
            </div>
            <div class="card-body">
                <p>Welkom in het admin panel van E-Shop!</p>
                <p>Gebruik het menu aan de linkerkant om door de verschillende secties te navigeren.</p>
                <hr>
                <p class="mb-0"><strong>Ingelogd als:</strong> <?= htmlspecialchars($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']); ?></p>
                <p class="mb-0"><strong>Email:</strong> <?= htmlspecialchars($_SESSION['user']['email']); ?></p>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
