<?php
require_once('files/functions.php');
admin_protected_area();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id < 1) {
    alert('danger', 'Ongeldig product id');
    header('Location: admin-producten.php');
    die();
}

$pro = get_product($id);
if (!$pro) {
    alert('danger', 'Product niet gevonden');
    header('Location: admin-producten.php');
    die();
}

require_once('files/header.php');
?>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
        <?php require_once('files/admin-sidebar.php') ?>

        <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
            <div class="pt-2 px-4 ps-lg-0 pe-xl-5">

                <h2 class="h3 mb-3">Product bewerken</h2>

                <form action="admin-product-update.php?id=<?= (int)$pro['id'] ?>" method="POST">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label class="form-label">Naam</label>
                            <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($pro['name']) ?>">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label class="form-label">Koopprijs</label>
                            <input class="form-control" type="text" name="koopprijs" value="<?= htmlspecialchars($pro['koopprijs']) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Verkoopprijs</label>
                            <input class="form-control" type="text" name="prijs" value="<?= htmlspecialchars($pro['prijs']) ?>">
                        </div>
                    </div>

                    <button class="btn btn-primary mt-4 w-100" type="submit">
                        Opslaan
                    </button>
                </form>

            </div>
        </section>

    </div>
</div>

<?php require_once('files/footer.php'); ?>