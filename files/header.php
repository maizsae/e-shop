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
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/drift-zoom/dist/drift-basic.min.css"/>
    <!--  Theme stijl + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
  </head>
  <body class="handheld-toolbar-enabled">
     <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>
    
    
    <main class="page-wrapper">
      <!-- Quick View Modal-->
      <div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title product-title"><a href="shop-single-v1.html" data-bs-toggle="tooltip" data-bs-placement="right" title="Ga naar pagina">makeup<i class="ci-arrow-right fs-lg ms-2"></i></a></h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Product gallerij-->
                <div class="col-lg-7 pe-lg-0">
                  <div class="product-gallery">
                    <div class="product-gallery-preview order-sm-2">
                      <div class="product-gallery-preview-item active" id="first"><img class="image-zoom" src="img/shop/single/gallery/01.jpg" data-zoom="img/shop/single/gallery/01.jpg" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="second"><img class="image-zoom" src="img/shop/single/gallery/02.jpg" data-zoom="img/shop/single/gallery/02.jpg" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="third"><img class="image-zoom" src="img/shop/single/gallery/03.jpg" data-zoom="img/shop/single/gallery/03.jpg" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                      <div class="product-gallery-preview-item" id="fourth"><img class="image-zoom" src="img/shop/single/gallery/04.jpg" data-zoom="img/shop/single/gallery/04.jpg" alt="Product image">
                        <div class="image-zoom-pane"></div>
                      </div>
                    </div>
                    <div class="product-gallery-thumblist order-sm-1"><a class="product-gallery-thumblist-item active" href="#first"><img src="img/shop/single/gallery/th01.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#second"><img src="img/shop/single/gallery/th02.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#third"><img src="img/shop/single/gallery/th03.jpg" alt="Product thumb"></a><a class="product-gallery-thumblist-item" href="#fourth"><img src="img/shop/single/gallery/th04.jpg" alt="Product thumb"></a></div>
                  </div>
                </div>
                <!-- Product details-->
                <div class="col-lg-5 pt-4 pt-lg-0 image-zoom-pane">
                  <div class="product-details ms-auto pb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2"><a href="shop-single-v1.html#reviews">
                        <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                        </div><span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 Reviews</span></a>
                      <button class="btn-wishlist" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
                    </div>
                    <div class="mb-3"><span class="h3 fw-normal text-accent me-1">$18.<small>99</small></span>
                      <del class="text-muted fs-lg me-3">$25.<small>00</small></del><span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                    </div>
                    <div class="fs-sm mb-4"><span class="text-heading fw-medium me-1">Color:</span><span class="text-muted" id="colorOptionText">Red/Dark blue/White</span></div>
                    <div class="position-relative me-n4 mb-3">
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color1" data-bs-label="colorOptionText" value="Red/Dark blue/White" checked>
                        <label class="form-option-label rounded-circle" for="color1"><span class="form-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-1.png)"></span></label>
                      </div>
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color2" data-bs-label="colorOptionText" value="Beige/White/Black">
                        <label class="form-option-label rounded-circle" for="color2"><span class="form-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-2.png)"></span></label>
                      </div>
                      <div class="form-check form-option form-check-inline mb-2">
                        <input class="form-check-input" type="radio" name="color" id="color3" data-bs-label="colorOptionText" value="Dark grey/White/Mustard">
                        <label class="form-option-label rounded-circle" for="color3"><span class="form-option-color rounded-circle" style="background-image: url(img/shop/single/color-opt-3.png)"></span></label>
                      </div>
                      <div class="product-badge product-available mt-n1"><i class="ci-security-check"></i>Product beschikbaar</div>
                    </div>
                    <form class="mb-grid-gutter">
                      <div class="mb-3">
                        <label class="fw-medium pb-1" for="product-size">Maat:</label>
                        <select class="form-select" required id="product-size">
                          <option value="">Select een maat</option>
                          <option value="xs">XS</option>
                          <option value="s">S</option>
                          <option value="m">M</option>
                          <option value="l">L</option>
                          <option value="xl">XL</option>
                        </select>
                      </div>
                      <div class="mb-3 d-flex align-items-center">
                        <select class="form-select me-3" style="width: 5rem;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Voeg toe</button>
                      </div>
                    </form>
                    <h5 class="h6 mb-3 pb-2 border-bottom"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</h5>
                    <h6 class="fs-sm mb-2">Style</h6>
                    <ul class="fs-sm ps-4">
                      <li>Hooded top</li>
                    </ul>
                    <h6 class="fs-sm mb-2">Composition</h6>
                    <ul class="fs-sm ps-4">
                      <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                      <li>Lining: Cotton 100%</li>
                      <li>Cotton 80%, Polyester 20%</li>
                    </ul>
                    <h6 class="fs-sm mb-2">Art. No.</h6>
                    <ul class="fs-sm ps-4 mb-0">
                      <li>183260098</li>
                    </ul>
                  </div>
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

      <!-- Midden: carousel met berichten (alleen desktop) -->
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


          <?php if (is_logged_in()){ ?>
<a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="account-bestellingen.php">
<?php }else{ ?>
<a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="login.php">
<?php } ?>

            <div class="navbar-tool-icon-box">
              <i class="navbar-tool-icon ci-user"></i>
            </div>
            <div class="navbar-tool-text ms-n3">
            <?php if (is_logged_in()){ ?>
            <small>Hallo, <?= $_SESSION['user']['first_name'] ?> </small>
            <?php }else{ ?>
            <small>Hallo, Inloggen</small>
            <?php } ?>
              Mijn Account
            </div>
          </a>

          <!-- Winkelmand -->
          <div class="navbar-tool dropdown ms-3">
            <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="shop-cart.html">
              <span class="navbar-tool-label">4</span>
              <i class="navbar-tool-icon ci-cart"></i>
            </a>
            <a class="navbar-tool-text" href="shop-cart.html">
              <small>Mijn winkelmand</small>€265,00
            </a>

            <div class="dropdown-menu dropdown-menu-end">
              <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                  <div class="widget-cart-item pb-2 border-bottom">
                    <button class="btn-close text-danger" type="button" aria-label="Remove">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                      <a class="flex-shrink-0" href="shop-single-v1.html">
                        <img src="img/shop/catalog/product2.jpg" width="64" alt="Product">
                      </a>
                      <div class="ps-2">
                        <h6 class="widget-product-title">
                          <a href="shop-single-v1.html">Gebreide top</a>
                        </h6>
                        <div class="widget-product-meta">
                          <span class="text-accent me-2">€14,<small>34</small></span>
                          <span class="text-muted">x 1</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="widget-cart-item py-2 border-bottom">
                    <button class="btn-close text-danger" type="button" aria-label="Remove">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                      <a class="flex-shrink-0" href="shop-single-v1.html">
                        <img src="img/shop/catalog/product5.jpg" width="64" alt="Product">
                      </a>
                      <div class="ps-2">
                        <h6 class="widget-product-title">
                          <a href="shop-single-v1.html">ROMAND Gloss</a>
                        </h6>
                        <div class="widget-product-meta">
                          <span class="text-accent me-2">€7,<small>50</small></span>
                          <span class="text-muted">x 1</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="widget-cart-item py-2 border-bottom">
                    <button class="btn-close text-danger" type="button" aria-label="Remove">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                      <a class="flex-shrink-0" href="shop-single-v1.html">
                        <img src="img/shop/catalog/product6.jpg" width="64" alt="Product">
                      </a>
                      <div class="ps-2">
                        <h6 class="widget-product-title">
                          <a href="shop-single-v1.html">dasique blush</a>
                        </h6>
                        <div class="widget-product-meta">
                          <span class="text-accent me-2">€14,<small>50</small></span>
                          <span class="text-muted">x 1</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="widget-cart-item py-2 border-bottom">
                    <button class="btn-close text-danger" type="button" aria-label="Remove">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                      <a class="flex-shrink-0" href="shop-single-v1.html">
                        <img src="img/shop/catalog/product3.jpg" width="64" alt="Product">
                      </a>
                      <div class="ps-2">
                        <h6 class="widget-product-title">
                          <a href="shop-single-v1.html">Buste top</a>
                        </h6>
                        <div class="widget-product-meta">
                          <span class="text-accent me-2">€18,<small>99</small></span>
                          <span class="text-muted">x 1</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                  <div class="fs-sm me-2 py-2">
                    <span class="text-muted">Subtotaal:</span>
                    <span class="text-accent fs-base ms-1">€55,<small>33</small></span>
                  </div>
                  <a class="btn btn-outline-secondary btn-sm" href="shop-cart.html">
                    Winkelmand uitvouwen<i class="ci-arrow-right ms-1 me-n1"></i>
                  </a>
                </div>
                <a class="btn btn-primary btn-sm d-block w-100" href="checkout-details.html">
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

            <!-- Account dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                Account
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown">
                  <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                     User Account
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="account-orders.html">Bestelgeschiedenis</a></li>
                    <li><a class="dropdown-item" href="account-profile.html">Profiel settings</a></li>
                    <li><a class="dropdown-item" href="account-address.html">Account adres</a></li>
                    <li><a class="dropdown-item" href="account-payment.html">Betaalmethodes</a></li>
                    <li><a class="dropdown-item" href="account-wishlist.html">Verlanglijst</a></li>
                    <li><a class="dropdown-item" href="account-tickets.html">Mijn Tickets</a></li>
                    <li><a class="dropdown-item" href="account-single-ticket.html">Single Ticket</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Vendor Dashboard
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="dashboard-settings.html">Settings</a></li>
                    <li><a class="dropdown-item" href="dashboard-purchases.html">Purchases</a></li>
                    <li><a class="dropdown-item" href="dashboard-favorites.html">Favorites</a></li>
                    <li><a class="dropdown-item" href="dashboard-sales.html">Sales</a></li>
                    <li><a class="dropdown-item" href="dashboard-products.html">Products</a></li>
                    <li><a class="dropdown-item" href="dashboard-add-new-product.html">Add New Product</a></li>
                    <li><a class="dropdown-item" href="dashboard-payouts.html">Payouts</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    NFT Marketplace<span class="badge bg-danger ms-1">NEW</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="nft-account-settings.html">Profiel instellingen</a></li>
                    <li><a class="dropdown-item" href="nft-account-payouts.html">Wallet &amp; Payouts</a></li>
                    <li><a class="dropdown-item" href="nft-account-my-items.html">Mijn items</a></li>
                    <li><a class="dropdown-item" href="nft-account-my-collections.html">Mijn Collecties</a></li>
                    <li><a class="dropdown-item" href="nft-account-favorites.html">Favorieten</a></li>
                    <li><a class="dropdown-item" href="nft-account-notifications.html">Notificaties</a></li>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="account-signin.html">Inloggen / aanmelden</a></li>
                <li><a class="dropdown-item" href="account-password-recovery.html">Wachtwoord herstellen</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

  </div>
</header>

<?php 
if(isset($_SESSION['alert'])){


?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>">
  <?= $_SESSION['alert']['message']  ?>

</div>

<?php unset($_SESSION['alert']);
 } ?>
