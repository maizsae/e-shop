<?php
require_once('files/functions.php');
protected_area();

$id  = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;

try {
    $res = cart_update_qty_db($_SESSION['user']['id'], $id, $qty);
    if (!$res['ok']) alert('danger', $res['error']);
} catch (Throwable $e) {
    alert('danger', 'DB fout: ' . $e->getMessage());
}

header('Location: winkelmand.php');
die();
