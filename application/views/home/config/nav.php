<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/home/') ?>img/core-img/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/home/') ?>style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                     <h3>Terima Kasih Sudah Mengunjungi Website Ini :)</h3>
                     <a href="<?=base_url('assets/manual_book.pdf')?>" class="btn btn-outline-primary" target="_blank">Manual Book </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->


    <!-- Top Header Area -->

    <!-- Top Social Area -->


    <!-- Logo Area -->
    <header class="header-area mb-500">
        <div class="top-header">
            <!-- Nav Area -->
            <div class="original-nav-area" id="stickyNav">
                <div class="classy-nav-container breakpoint-off ">
                    <div class="container">
                        <!-- Classy Menu -->
                        <nav class="classy-navbar justify-content-between">

                            <!-- Subscribe btn -->
                            <?php foreach ($config as $aa) { ?>
                                <div class="post-tag">
                                    <a href="#" class=" post-tag" data-toggle="modal" data-target="#subsModal"><?= $aa->judul_website ?></a>
                                </div>

                                <!-- Navbar Toggler -->
                                <div class="classy-navbar-toggler">
                                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                                </div>

                                <!-- Menu -->
                                <div class="classy-menu" id="originalNav">
                                    <!-- close btn -->
                                    <div class="classycloseIcon">
                                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                    </div>

                                    <!-- Nav Start -->
                                    <div class="classynav">
                                        <ul>
                                            <li><a href="<?= base_url('home') ?>">Home</a></li>
                                            <li><a href="<?= base_url('home/konten') ?>">Konten</a> </li>
                                            <li><a href="<?= base_url('home/kategori') ?>">Kategori</a>
                                                <ul class="dropdown">
                                                    <?php foreach ($kategori as $k) { ?>
                                                        <li>
                                                            <a href="<?= base_url('home/by_kategori/' . $k->id_kategori) ?>"><?= $k->kategori ?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a href="<?= base_url('home/about') ?>">About me</a></li>
                                            <li><a href="<?= base_url('home/gallery') ?>">Galeri</a>

                                            <?php
                                            if ($this->session->userdata('logged_in') !== true) {
                                                echo '<li><a href="' . base_url('auth') . '" style="color:red;">Login</a></li>';
                                            } else {
                                                echo '<li><a href="' . base_url('auth/alih') . '" style="color:red;">Upload Konten</a></li>';
                                            }
                                            ?>
                                        </ul>

                                        <!-- Search Form  -->
                                        <div id="search-wrapper">
                                            <form action="<?= base_url('home/search') ?>" method="post">
                                                <input type="text" id="search" name="keyword" placeholder="Search something...">
                                                <div id="close-icon"></div>
                                                <input class="d-none" type="submit" value="">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Nav End -->
                                </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php } ?>