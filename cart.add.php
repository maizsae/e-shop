<?php
require_once('files/functions.php');
protected_area(); // winkelmand alleen voor ingelogde users

$id  = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$qty = isset($_GET['qty']) ? (int)$_GET['qty'] : 1;

try {
    $res = cart_add_db($_SESSION['user']['id'], $id, $qty);
    if (!$res['ok']) {
        alert('danger', $res['error']);
    } else {
        alert('success', 'Toegevoegd aan winkelmand');
    }
} catch (Throwable $e) {
    alert('danger', 'DB fout: ' . $e->getMessage());
}

$back = $_SERVER['HTTP_REFERER'] ?? 'shop.php';
header('Location: ' . $back);
die();
