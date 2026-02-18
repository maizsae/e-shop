<?php
$page_title = 'Producten Beheren';
require_once('header.php');

$products = db_select('products');
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Alle Producten</h6>
                <a href="add-product.php" class="btn btn-primary btn-sm">
                    <i class="ci-plus-circle me-2"></i>Nieuw Product
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Naam</th>
                                <th>Prijs</th>
                                <th>Categorie</th>
                                <th>Voorraad</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Geen producten gevonden</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($product['id']); ?></td>
                                        <td><?= htmlspecialchars($product['name'] ?? 'N/A'); ?></td>
                                        <td>€<?= number_format($product['price'] ?? 0, 2, ',', '.'); ?></td>
                                        <td><?= htmlspecialchars($product['category_id'] ?? 'N/A'); ?></td>
                                        <td><?= htmlspecialchars($product['stock'] ?? 'N/A'); ?></td>
                                        <td>
                                            <a href="edit-product.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="ci-edit"></i> Bewerken
                                            </a>
                                            <a href="delete-product.php?id=<?= $product['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Weet u zeker dat u dit product wilt verwijderen?');">
                                                <i class="ci-trash"></i> Verwijderen
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
