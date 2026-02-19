<?php
require_once('files/header.php');
$producten = db_select('producten', '1 ORDER BY id DESC ');
?>

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="ci-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap"><a href="#">Shop</a></li>

                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Shop!</h1>
        </div>
    </div>
</div>

<div class="container pb-5 mb-2 mb-md-4">
    <div class="row">

        <!-- Content (full width) -->
        <section class="col-lg-12">

            <!-- Toolbar-->
            <div class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                <div class="d-flex flex-wrap">
                    <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">

                    </div>
                </div>




            </div>

            <!-- Products grid-->
            <div class="row mx-n2">
                <?php foreach ($producten as $key => $pro) { ?>
                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Voeg toe aan verlanglijst">
                                <i class="ci-heart"></i>
                            </button>

                            <a class="card-img-top d-block overflow-hidden" href="product.php?id=<?= $pro['id'] ?>">
                                <img src="<?= get_product_image($pro['photo']) ?>" alt="Product">
                            </a>

                            <div class="card-body py-2">
                                <a class="product-meta d-block fs-xs pb-1"></a>
                                <h3 class="product-title fs-sm">
                                    <a href="product.php?id=<?= $pro['id'] ?>"><?= $pro['name'] ?></a>
                                </h3>

                                <div class="d-flex justify-content-between">
                                    <div class="product-price">
                                        <span class="text-accent">$<?= $pro['prijs'] ?>.<small>00</small></span>
                                    </div>

                                    <div class="star-rating">
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star-filled active"></i>
                                        <i class="star-rating-icon ci-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size<?= $key ?>" id="s-75-<?= $key ?>">
                                        <label class="form-option-label" for="s-75-<?= $key ?>">7.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size<?= $key ?>" id="s-80-<?= $key ?>" checked>
                                        <label class="form-option-label" for="s-80-<?= $key ?>">8</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size<?= $key ?>" id="s-85-<?= $key ?>">
                                        <label class="form-option-label" for="s-85-<?= $key ?>">8.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size<?= $key ?>" id="s-90-<?= $key ?>">
                                        <label class="form-option-label" for="s-90-<?= $key ?>">9</label>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-sm d-block w-100 mb-2" type="button">
                                    <i class="ci-cart fs-sm me-1"></i>Voeg toe aan de winkelmand
                                </button>

                                <div class="text-center">
                                    <a class="nav-link-style fs-ms" href="#quick-view" data-bs-toggle="modal">
                                        <i class="ci-eye align-middle me-1"></i>Quick view
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr class="d-sm-none">
                    </div>
                <?php } ?>
            </div>

            <!-- Banner-->
            <div class="py-sm-2">
                <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                    <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                        <h4 class="fs-lg fw-light mb-2">Wees er snel bij!</h4>
                        <h3 class="mb-4">Alle schoenen hebben korting!</h3>
                        <a class="btn btn-primary btn-shadow btn-sm" href="#">Winkel nu</a>
                    </div>
                    <img class="d-block ms-auto" src="img/shop/catalog/product9.jpg" alt="hakken">
                </div>
            </div>

            <hr class="my-3">

            <!-- Pagination-->
            <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Vorige</a></li>
                </ul>
                <ul class="pagination">
                    <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                    <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                    <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                </ul>
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next">Volgende<i class="ci-arrow-right ms-2"></i></a></li>
                </ul>
            </nav>

        </section>
        <!-- /Content -->

    </div>
</div>

<?php
require_once('files/footer.php');
?>