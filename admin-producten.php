<?php
require_once('files/functions.php');

protected_area();

$producten = db_select('producten', '1 ORDER BY id DESC ');


require_once('files/header.php');
?>

<div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">

    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item">
            <a class="text-nowrap" href="index.php">
              <i class="ci-home"></i>Home
            </a>
          </li>

          <li class="breadcrumb-item text-nowrap">
            <a href="#">Account</a>
          </li>

          <li class="breadcrumb-item text-nowrap active">
            Mijn producten
          </li>

        </ol>
      </nav>
    </div>

    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Mijn producten</h1>
    </div>

  </div>
</div>


<div class="container pb-5 mb-2 mb-md-4">
  <div class="row">

    <?php require_once('files/account-sidebar.php') ?>


    <!-- Content -->
    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">

      <div class="pt-2 px-4 ps-lg-0 pe-xl-5">


        <!-- Title -->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center border-bottom">

          <h2 class="h3 py-2 me-2 text-center text-sm-start">
            Your products
            <span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">
              <?= count($producten) ?>
            </span>
          </h2>

        </div>


        <?php foreach ($producten as $pro): ?>

          <?php
          // decode foto's uit JSON
          $photos = json_decode($pro['photo'], true);

          // pak eerste foto of default
          $photo = !empty($photos) && isset($photos[0]['src'])
            ? $photos[0]['src']
            : 'uploads/default.jpg';
          ?>


          <!-- Product -->
          <div class="d-block d-sm-flex align-items-center py-4 border-bottom">

            <!-- Product Image -->
            <a class="d-block mb-3 mb-sm-0 me-sm-4 ms-sm-0 mx-auto"
              href="#"
              style="width: 12.5rem;">

              <img class="rounded-3"
                src="<?= get_product_image($pro['photo']); ?>"
                alt="<?= htmlspecialchars($pro['name']) ?>"
                style="width:100%; height:auto;">

            </a>


            <!-- Product Info -->
            <div class="text-center text-sm-start">

              <h3 class="h6 product-title mb-2">
                <?= htmlspecialchars($pro['name']) ?>
              </h3>


              <div class="d-inline-block text-accent">
                €<?= htmlspecialchars($pro['prijs']) ?>
              </div>


              <div class="d-flex justify-content-center justify-content-sm-start pt-3">

                <button class="btn bg-faded-info btn-icon me-2"
                  type="button"
                  title="Edit">
                  <i class="ci-edit text-info"></i>
                </button>


                <button class="btn bg-faded-danger btn-icon"
                  type="button"
                  title="Delete">
                  <i class="ci-trash text-danger"></i>
                </button>

              </div>

            </div>

          </div>


        <?php endforeach; ?>


      </div>

    </section>

  </div>
</div>


<?php require_once('files/footer.php'); ?>