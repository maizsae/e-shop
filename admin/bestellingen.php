<?php
$page_title = 'Bestellingen Beheren';
require_once('header.php');

$orders = db_select('orders');
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Alle Bestellingen</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Gebruiker</th>
                                <th>Datum</th>
                                <th>Status</th>
                                <th>Totaal</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($orders)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">Geen bestellingen gevonden</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td>#<?= htmlspecialchars($order['id']); ?></td>
                                        <td><?= htmlspecialchars($order['user_id'] ?? 'N/A'); ?></td>
                                        <td><?= date('d-m-Y H:i', $order['created'] ?? time()); ?></td>
                                        <td>
                                            <span class="badge bg-<?= ($order['status'] ?? 'pending') == 'completed' ? 'success' : 'warning'; ?>">
                                                <?= htmlspecialchars($order['status'] ?? 'Pending'); ?>
                                            </span>
                                        </td>
                                        <td>€<?= number_format($order['total'] ?? 0, 2, ',', '.'); ?></td>
                                        <td>
                                            <a href="view-order.php?id=<?= $order['id']; ?>" class="btn btn-sm btn-info">
                                                <i class="ci-eye"></i> Bekijken
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
