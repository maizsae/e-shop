<?php 
require_once('../files/functions.php');
admin_protected_area();
?> 
<!DOCTYPE html>
<html lang="nl">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>Admin Panel | E-Shop</title>
    <meta name="description" content="Admin Dashboard voor E-Shop beheer">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" media="screen" href="../vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css"/>
    <!--  Theme stijl + Bootstrap-->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <style>
        .admin-sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
        }
        .admin-content {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Admin Sidebar -->
            <nav class="col-md-3 col-lg-2 admin-sidebar px-0">
                <div class="position-sticky pt-3">
                    <div class="px-3 mb-4">
                        <h4 class="text-white mb-0">Admin Panel</h4>
                        <small class="text-white-50">E-Shop Beheer</small>
                    </div>
                    <?php require_once(__DIR__ . '/sidebar.php'); ?>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 admin-content px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $page_title ?? 'Dashboard'; ?></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <span class="text-muted">Ingelogd als: <strong><?= htmlspecialchars($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']); ?></strong></span>
                        </div>
                        <a href="../index.php" class="btn btn-sm btn-outline-secondary me-2" target="_blank">
                            <i class="ci-home"></i> Website bekijken
                        </a>
                        <a href="../logout.php" class="btn btn-sm btn-outline-danger">
                            <i class="ci-sign-out"></i> Uitloggen
                        </a>
                    </div>
                </div>

                <!-- Alert Messages -->
                <?php if (isset($_SESSION['alert'])): ?>
                    <div class="alert alert-<?= $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($_SESSION['alert']['message']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert']); ?>
                <?php endif; ?>
