<?php
require_once('files/functions.php');
protected_area();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {
    cart_remove_db($_SESSION['user']['id'], $id);
    alert('success', 'Product verwijderd uit winkelmand');
} catch (Throwable $e) {
    alert('danger', 'DB fout: ' . $e->getMessage());
}

header('Location: winkelmand.php');
die();
