<?php
$page_title = 'Nieuwe Categorie Toevoegen';
require_once('header.php');

$rows = db_select('categories', 'parent_id = 0');
$categories = [];

$categories[0] = 'Geen parent';
foreach ($rows as $val) {
  $categories[$val['id']] = $val['name'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['form']['value'] = $_POST;

  $imgs = upload_images($_FILES);
  $imgs = [];
  $data['name'] = $_POST['name'];
  $data['photo'] = json_encode($imgs);
  $data['parent_id'] = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : 0;

  if (db_insert('categories', $data)) {
    alert('success', 'Categorie is succesvol aangemaakt');
    header('Location: add-categorie.php');
    unset($_SESSION['form']);
  } else {
    alert('danger', 'Gefaald om een categorie toe te voegen, probeer het nog een keer');
    header('Location: add-categorie.php');
  }
  die();
}
?>

<div class="row">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Nieuwe Categorie Toevoegen</h6>
            </div>
            <div class="card-body">
                <form action="add-categorie.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <?= text_input([
                            'name' => 'name',
                            'label' => 'Categorie Naam',
                        ]) ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <?= select_input([
                                    'name' => 'parent_id',
                                    'label' => 'Parent Categorie',
                                ], $categories) ?>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="photo" class="form-label">Categorie Foto</label>
                                <input class="form-control" name="photo" type="file" accept=".jpg,.jpeg,.png">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="ci-cloud-upload me-2"></i>Categorie Toevoegen
                    </button>
                    <a href="categorieen.php" class="btn btn-secondary">Annuleren</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
