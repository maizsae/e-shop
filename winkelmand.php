<?php
require_once('files/functions.php');
protected_area();
require_once('files/header.php');

$cart = [];
$total = 0.0;

try {
    $cart = cart_items_db($_SESSION['user']['id']);
} catch (Throwable $e) {
    alert('danger', 'Database fout: ' . $e->getMessage());
    $cart = [];
}
?>

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Winkelmand</h1>
        </div>
    </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <section class="col-lg-12 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 ps-lg-0 pe-xl-5">

                <?php if (empty($cart)): ?>
                    <div class="alert alert-info">Je winkelmand is leeg.</div>
                    <a class="btn btn-primary" href="shop.php">Verder winkelen</a>
                <?php else: ?>

                    <?php foreach ($cart as $item): ?>
                        <?php
                        $line = (float)$item['prijs'] * (int)$item['qty'];
                        $total += $line;
                        ?>

                        <div class="d-sm-flex justify-content-between align-items-center my-3 pb-3 border-bottom">
                            <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                                <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" style="width: 8rem;" href="product.php?id=<?= (int)$item['id'] ?>">
                                    <img class="rounded-3" src="<?= htmlspecialchars(get_product_image($item['photo'])) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width:100%;height:auto;">
                                </a>

                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2">
                                        <a href="product.php?id=<?= (int)$item['id'] ?>"><?= htmlspecialchars($item['name']) ?></a>
                                    </h3>

                                    <div class="fs-sm">
                                        Prijs: <span class="text-accent">€<?= number_format((float)$item['prijs'], 2, ',', '.') ?></span>
                                    </div>

                                    <div class="fs-sm">
                                        Subtotaal: <strong>€<?= number_format($line, 2, ',', '.') ?></strong>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2 pt-sm-0 d-flex align-items-center justify-content-center">

                                <form class="d-flex align-items-center me-3" action="cart-update.php" method="POST">
                                    <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
                                    <input class="form-control me-2" style="width: 5rem;" type="number" name="qty" min="0" value="<?= (int)$item['qty'] ?>">
                                    <button class="btn btn-outline-primary btn-sm" type="submit">Update</button>
                                </form>

                                <a class="btn btn-outline-danger btn-sm"
                                    href="cart-remove.php?id=<?= (int)$item['id'] ?>"
                                    onclick="return confirm('Verwijderen uit winkelmand?');">
                                    Verwijder
                                </a>

                            </div>
                        </div>

                    <?php endforeach; ?>

                    <div class="d-flex justify-content-end mt-4">
                        <div class="text-end">
                            <div class="h4 mb-3">Totaal: €<?= number_format($total, 2, ',', '.') ?></div>
                            <a class="btn btn-primary" href="checkout.php">Afrekenen</a>
                            <a class="btn btn-outline-secondary ms-2" href="shop.php">Verder winkelen</a>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </section>
    </div>
</div>

<?php require_once('files/footer.php'); ?>