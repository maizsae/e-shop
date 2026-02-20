<?php
require_once('files/functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
  <meta charset="utf-8">
  <title>Yesstyle | Fashion Store</title>
  <meta name="description" content="YesStyle is jouw online bestemming voor trendy fashion en make-up. Van streetwear tot beauty must-haves – ontdek jouw perfecte look vandaag nog.">
  <meta name="keywords" content="makeup, shop, e-commerce, korean, kleding, skincare,  business, mobile">
  <meta name="author" content="Romaisae Kadour">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">
  <link rel="mask-icon" color="#fe6a6a" href="safari-pinned-tab.svg">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css" />
  <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css" />
  <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css" />
  <!--  Theme stijl + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
</head>

<body class="handheld-toolbar-enabled">
  <noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
  </noscript>

  <main class="page-wrapper">




    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <header class="shadow-sm">
      <!-- Topbar-->
      <div class="topbar topbar-dark bg-dark">
        <div class="container d-flex align-items-center justify-content-between">

          <!-- Linkerkant support tekst -->
          <div class="d-flex align-items-center">
            <div class="topbar-text text-nowrap d-none d-md-inline-block">
              <i class="ci-support"></i>
              <span class="text-muted me-1">Support</span>
              <a class="topbar-link" href="tel:00331697720">+31 685124157</a>
            </div>
          </div>

          <div class="flex-grow-1 mx-3 d-none d-md-block">
            <div class="tns-carousel tns-controls-static">
              <div class="tns-carousel-inner" data-carousel-options='{"mode":"gallery","nav":false}'>
                <div class="topbar-text text-center">Gratis verzending bij bestellingen boven de €200.</div>
                <div class="topbar-text text-center">Wij betalen uw geld binnen 30 dagen terug.</div>
                <div class="topbar-text text-center">Vriendelijke klantenservice, 24/7 beschikbaar.</div>
              </div>
            </div>
          </div>

          <!-- Rechterkant: tracking + taal/valuta -->
          <div class="d-flex align-items-center ms-3 text-nowrap">
            <a class="topbar-link me-4 d-none d-md-inline-block" href="order-tracking.html">
              <i class="ci-location"></i>Bestelling tracking
            </a>
            <div class="topbar-text dropdown disable-autohide">
              <a class="topbar-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <img class="me-2" src="img/flags/en.png" width="20" alt="English">
                EUR / €
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item">
                  <select class="form-select form-select-sm">
                    <option value="usd">$ USD</option>
                    <option value="eur">€ EUR</option>
                    <option value="ukp">£ UKP</option>
                    <option value="jpy">¥ JPY</option>
                  </select>
                </li>
                <li>
                  <a class="dropdown-item pb-1" href="#">
                    <img class="me-2" src="img/flags/fr.png" width="20" alt="Français">Français
                  </a>
                </li>
                <li>
                  <a class="dropdown-item pb-1" href="#">
                    <img class="me-2" src="img/flags/de.png" width="20" alt="Deutsch">Deutsch
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <img class="me-2" src="img/flags/it.png" width="20" alt="Italiano">Italiano
                  </a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <!-- Navbar -->
      <div class="navbar-sticky bg-light">
        <div class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="<?= url('') ?>">
              <img src="img/logo.png" width="142" alt="Yesstyle">
            </a>
            <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="/">
              <img src="img/logo.png" width="74" alt="Yesstyle">
            </a>

            <!-- Search (desktop) -->
            <div class="input-group d-none d-lg-flex mx-4">
              <input class="form-control rounded-end pe-5" type="text" placeholder="Zoek naar producten">
              <i class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
            </div>

            <!-- Toolbar (icons) -->
            <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
              </button>

              <a class="navbar-tool navbar-stuck-toggler" href="#">
                <span class="navbar-tool-tooltip">Vouw menu uit</span>
                <div class="navbar-tool-icon-box">
                  <i class="navbar-tool-icon ci-menu"></i>
                </div>
              </a>

              <a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html">
                <span class="navbar-tool-tooltip">Verlanglijst</span>
                <div class="navbar-tool-icon-box">
                  <i class="navbar-tool-icon ci-heart"></i>
                </div>
              </a>

              <?php if (is_logged_in()) { ?>
                <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-bestellingen.php">
                <?php } else { ?>
                  <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="login.php">
                  <?php } ?>

                  <div class="navbar-tool-icon-box">
                    <i class="navbar-tool-icon ci-user"></i>
                  </div>
                  <div class="navbar-tool-text ms-n3">
                    <?php if (is_logged_in()) { ?>
                      <small>Hallo, <?= $_SESSION['user']['first_name'] ?> </small>
                    <?php } else { ?>
                      <small>Hallo, Inloggen</small>
                    <?php } ?>
                    Mijn Account
                  </div>
                  </a>

                  <?php
                  // ======= DB winkelmand data voor header =======
                  $headerCart = [];
                  $headerCartCount = 0;
                  $headerCartTotal = 0.0;

                  if (is_logged_in()) {
                    try {
                      $headerCart = cart_items_db($_SESSION['user']['id']);
                      foreach ($headerCart as $it) {
                        $headerCartCount += (int)$it['qty'];
                        $headerCartTotal += ((float)$it['prijs']) * (int)$it['qty'];
                      }
                    } catch (Throwable $e) {
                      $headerCart = [];
                      $headerCartCount = 0;
                      $headerCartTotal = 0.0;
                    }
                  }
                  ?>

                  <!-- Winkelmand (DYNAMIC) -->
                  <div class="navbar-tool dropdown ms-3">

                    <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="winkelmand.php">
                      <span class="navbar-tool-label"><?= (int)$headerCartCount ?></span>
                      <i class="navbar-tool-icon ci-cart"></i>
                    </a>

                    <a class="navbar-tool-text" href="winkelmand.php">
                      <small>Mijn winkelmand</small>
                      €<?= number_format((float)$headerCartTotal, 2, ',', '.') ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end">
                      <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                        <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">

                          <?php if (!is_logged_in()): ?>
                            <div class="text-center py-4 text-muted">Log in om je winkelmand te zien.</div>

                          <?php elseif (empty($headerCart)): ?>
                            <div class="text-center py-4 text-muted">Je winkelmand is leeg.</div>

                          <?php else: ?>
                            <?php foreach ($headerCart as $item): ?>
                              <div class="widget-cart-item pb-2 border-bottom">

                                <a class="btn-close text-danger"
                                  href="cart-remove.php?id=<?= (int)$item['id'] ?>"
                                  aria-label="Remove">
                                  <span aria-hidden="true">&times;</span>
                                </a>

                                <div class="d-flex align-items-center">
                                  <a class="flex-shrink-0" href="product.php?id=<?= (int)$item['id'] ?>">
                                    <img src="<?= htmlspecialchars(get_product_image($item['photo'])) ?>" width="64" alt="Product">
                                  </a>
                                  <div class="ps-2">
                                    <h6 class="widget-product-title">
                                      <a href="product.php?id=<?= (int)$item['id'] ?>">
                                        <?= htmlspecialchars($item['name']) ?>
                                      </a>
                                    </h6>
                                    <div class="widget-product-meta">
                                      <span class="text-accent me-2">
                                        €<?= number_format((float)$item['prijs'], 2, ',', '.') ?>
                                      </span>
                                      <span class="text-muted">x <?= (int)$item['qty'] ?></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            <?php endforeach; ?>
                          <?php endif; ?>

                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                          <div class="fs-sm me-2 py-2">
                            <span class="text-muted">Subtotaal:</span>
                            <span class="text-accent fs-base ms-1">
                              €<?= number_format((float)$headerCartTotal, 2, ',', '.') ?>
                            </span>
                          </div>
                          <a class="btn btn-outline-secondary btn-sm" href="winkelmand.php">
                            Winkelmand uitvouwen<i class="ci-arrow-right ms-1 me-n1"></i>
                          </a>
                        </div>

                        <!-- als je nog geen checkout.php hebt: zet deze link tijdelijk naar winkelmand.php -->
                        <a class="btn btn-primary btn-sm d-block w-100" href="checkout.php">
                          <i class="ci-card me-2 fs-base align-middle"></i>Afrekenen
                        </a>

                      </div>
                    </div>
                  </div>
                  <!-- Einde winkelmand -->
            </div>
          </div>
        </div>

        <!-- Tweede rij navbar: menu -->
        <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
          <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">

              <!-- Search (mobile) -->
              <div class="input-group d-lg-none my-3">
                <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                <input class="form-control rounded-start" type="text" placeholder="Zoek naar producten">
              </div>

              <!-- Departments menu -->
              <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle ps-lg-0" href="#" data-bs-toggle="dropdown">
                    <i class="ci-view-grid me-2"></i>Afdelingen
                  </a>
                  <div class="dropdown-menu px-2 pb-4">
                    <!-- jouw originele content blijft hier hetzelfde -->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                      <div class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/coquette lace pink top.jpg" alt="Kleding">
                          </a>
                          <h6 class="fs-base mb-2">Kleding</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Vrouwen Kleding</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Mannen Kleding</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kinder Kleding</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/Women's High Platform Thick Bottom Cute Street& Campus Style Mid-Calf Boots.jpg" alt="Schoenen">
                          </a>
                          <h6 class="fs-base mb-2">Schoenen</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Vrouwen schoenen</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Mannen schoenen</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Kinder schoenen</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/Flower Knows - Strawberry Cupid Liquid Blush - 6 Colors _ YesStyle.jpg" alt="Makeup">
                          </a>
                          <h6 class="fs-base mb-2">Makeup</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Lip producten</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Oog producten</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Gezichts Producten</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex flex-wrap flex-sm-nowrap">
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/Skin Daily Skincare Set,Gentle Korean Skin Care Set,Skin Care Routine Kit for Women Gift Sets Includes Cleanser,Toner,Lotion,Serum,Eye Serum,Essence Cream Sakura Beauty Products (SetA).jpg" alt="Skincare">
                          </a>
                          <h6 class="fs-base mb-2">Skincare</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Face cleansers</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Face serums</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Moisturizers</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/Shop Smoke 'N Roses Brush Roll - Makeup Brush Kit _ Brushes & Tools by ColourPop®.jpg" alt="Tools">
                          </a>
                          <h6 class="fs-base mb-2">Tools en Brushes</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Haar tools</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Makeup tools</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Skincare tools</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mega-dropdown-column pt-4 px-2 px-lg-3">
                        <div class="widget widget-links">
                          <a class="d-block overflow-hidden rounded-3 mb-3" href="#">
                            <img src="img/shop/departments/& Honey Melty Moist Repair Shampoo & Treatment Set 440ml Each.jpg" alt="Hair">
                          </a>
                          <h6 class="fs-base mb-2">Hair care</h6>
                          <ul class="widget-list">
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Haar treatments</a></li>
                            <li class="widget-list-item mb-1"><a class="widget-list-link" href="#">Shampoos</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>

              <!-- Primary menu -->
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link" href="shop.php">Shop</a>



            </div>
          </div>
        </div>

      </div>
    </header>

    <?php
    if (isset($_SESSION['alert'])) {
    ?>
      <div class="alert alert-<?= $_SESSION['alert']['type'] ?>">
        <?= $_SESSION['alert']['message']  ?>
      </div>
    <?php unset($_SESSION['alert']);
    } ?>