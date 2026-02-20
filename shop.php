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


            <div class="row mx-n2">
                <?php foreach ($producten as $key => $pro) {
                    echo product_item_ui_1($pro);
                } ?>
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