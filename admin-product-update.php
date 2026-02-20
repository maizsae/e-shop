<?php
require_once('files/functions.php');
admin_protected_area();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id < 1) {
    alert('danger', 'Ongeldig product id');
    header('Location: admin-producten.php');
    die();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: admin-product-edit.php?id=$id");
    die();
}

$data = [
    'name' => $_POST['name'] ?? '',
    'prijs' => $_POST['prijs'] ?? '',
    'koopprijs' => $_POST['koopprijs'] ?? '',
];

if (db_update('producten', $data, "id = $id")) {
    alert('success', 'Product bijgewerkt');
    header('Location: admin-producten.php');
    die();
} else {
    alert('danger', 'Bijwerken mislukt');
    header("Location: admin-product-edit.php?id=$id");
    die();
}
