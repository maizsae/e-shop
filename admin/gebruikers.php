<?php
$page_title = 'Gebruikers Beheren';
require_once('header.php');

$users = db_select('users');
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alle Gebruikers</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Naam</th>
                                <th>Email</th>
                                <th>Telefoon</th>
                                <th>Type</th>
                                <th>Geregistreerd</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($users)): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Geen gebruikers gevonden</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($user['id']); ?></td>
                                        <td><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                                        <td><?= htmlspecialchars($user['email']); ?></td>
                                        <td><?= htmlspecialchars($user['phone_number'] ?? 'N/A'); ?></td>
                                        <td>
                                            <span class="badge bg-<?= ($user['user_type'] ?? 'klant') == 'admin' ? 'danger' : 'primary'; ?>">
                                                <?= htmlspecialchars(ucfirst($user['user_type'] ?? 'klant')); ?>
                                            </span>
                                        </td>
                                        <td><?= date('d-m-Y', $user['created'] ?? time()); ?></td>
                                        <td>
                                            <a href="edit-user.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-warning">
                                                <i class="ci-edit"></i> Bewerken
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
