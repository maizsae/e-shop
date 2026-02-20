<?php require_once('files/functions.php');
admin_protected_area();
$rows = db_select('categories', 'parent_id = 0');
$categories = [];
foreach ($rows as $val) {
  $categories[$val['id']] = $val['name'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['form']['value'] = $_POST;

  // Bouw een lijst van uploads uit je 6 inputs (photo_1 .. photo_6)
  $files = [];
  foreach ($_FILES as $file) {
    // Alleen toevoegen als er echt een bestand gekozen is
    if (isset($file['error']) && $file['error'] === 0) {
      $files[] = $file;
    }
  }

  // Upload en krijg array terug: [ ['src' => 'uploads/...jpg'], ... ]
  $imgs = upload_images($files);

  $data = [];
  $data['name'] = $_POST['name'];
  $data['prijs'] = $_POST['prijs'];
  $data['koopprijs'] = $_POST['koopprijs'];
  $data['photo'] = json_encode($imgs);
  $data['user_id'] = $_SESSION['user']['id'];

  if (db_insert('producten', $data)) {
    alert('success', 'product is succesvol aangemaakt');
    header('Location: admin-producten.php');
    unset($_SESSION['form']);
  } else {
    alert('danger', 'Gefaald om een product toe te voegen, probeer het nog een keer');
    header('Location: admin-add-categorie.php');
  }
  die();
}

require_once('files/header.php'); ?> <div class="page-title-overlap bg-dark pt-4">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index-2.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Account</a> </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Bestelgeschiedenis</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h3 text-light mb-0">Mijn bestellingen</h1>
    </div>
  </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
  <div class="row"> <?php require_once('files/admin-sidebar.php') ?> <!-- Content -->
    <section class="col-lg-8 pt-lg-4 pb-4 mb-3">
      <div class="pt-2 px-4 ps-lg-0 pe-xl-5"> <!-- Title-->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center pb-2">
          <h2 class="h3 py-2 me-2 text-center text-sm-start">Voeg een nieuwe product toe</h2>
          <div class="py-2"> <select class="form-select me-2" id="unp-category">
              <option>Selecteer een categorie</option>
              <option>Photos</option>
              <option>Graphics</option>
              <option>UI Design</option>
              <option>Web Themes</option>
              <option>Fonts</option>
              <option>Add-Ons</option>
            </select> </div>
        </div>
        <form action="admin-add-categorie.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3 pb-2">
            <div class="row mt-4">
              <div class="col-md-12"> <?= text_input(['name' => 'name',]) ?> </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6"> <?= text_input(['name' => 'koopprijs', 'label' => 'koopprijs',]) ?> </div>
              <div class="col-md-6"> <label class="form-label">verkoop prijs</label> <input class="form-control" type="text" name="prijs"> </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 1</label> <input class="form-control" name="photo_1" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 2 </label> <input class="form-control" name="photo_2" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 3 </label> <input class="form-control" name="photo_3" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 4 </label> <input class="form-control" name="photo_4" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 5 </label> <input class="form-control" name="photo_5" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
              <div class="col-md-6 mt-3">
                <div class="form-group"> <label for="photo">Product foto 6 </label> <input class="form-control" name="photo_6" type="file" accept=".jpg,.jpeg,.png"> </div>
              </div>
            </div>
          </div> <button class="btn btn-primary d-block w-100" type="submit"><i class="ci-cloud-upload fs-lg me-2"></i>Upload Product</button>
        </form>
      </div>
    </section>
  </div>
</div> <?php require_once('files/footer.php'); ?>