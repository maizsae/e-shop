<?php
echo "PHP DRAAIT";
die();
require_once('files/functions.php');
admin_protected_area();

require_once('files/functions.php');
admin_protected_area();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id < 1) {
    alert('danger', 'Ongeldig product id');
    header('Location: admin-producten.php');
    die();
}

if (db_delete('producten', "id = $id")) {
    alert('success', 'Product verwijderd');
} else {
    alert('danger', 'Verwijderen mislukt');
}

header('Location: admin-producten.php');
die();
