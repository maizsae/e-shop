<?php
$page_title = 'Categorieën Beheren';
require_once('header.php');

$categories = db_select('categories');
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Alle Categorieën</h6>
                <a href="add-categorie.php" class="btn btn-primary btn-sm">
                    <i class="ci-plus-circle me-2"></i>Nieuwe Categorie
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Naam</th>
                                <th>Parent ID</th>
                                <th>Foto</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($categories)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Geen categorieën gevonden</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($category['id']); ?></td>
                                        <td><?= htmlspecialchars($category['name']); ?></td>
                                        <td><?= htmlspecialchars($category['parent_id'] ?? '0'); ?></td>
                                        <td>
                                            <?php 
                                            $photo = json_decode($category['photo'] ?? '[]', true);
                                            if (!empty($photo) && isset($photo[0]['src'])): 
                                            ?>
                                                <img src="../<?= htmlspecialchars($photo[0]['src']); ?>" alt="Categorie foto" style="max-width: 50px; max-height: 50px;">
                                            <?php else: ?>
                                                <span class="text-muted">Geen foto</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="edit-categorie.php?id=<?= $category['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="ci-edit"></i> Bewerken
                                            </a>
                                            <a href="delete-categorie.php?id=<?= $category['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Weet u zeker dat u deze categorie wilt verwijderen?');">
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
