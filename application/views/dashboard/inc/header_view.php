<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeIgniter Ftw</title>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">

    <script src="<?= base_url() ?>public/js/jquery.js"></script>
    <script src="<?= base_url() ?>public/js/bootstrap.js"></script>
</head>
<body>

<header>
    Jr Dashboard
</header>
<!--start wrapper-->
<div class="wrapper">

<nav class="navbar clearfix bg-secondary">
    <div class="navbar-inner">
        <span class="brand">jrDash</span>
    <ul class="nav">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">User</a></li>
        <li><a href="<?php echo site_url('dashboard/logout') ?>">Logout</a></li>
    </ul>
    </div>
</nav>