<?php
    include 'koneksi.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    if($page == 'home') include 'home.html';
    if($page == 'admin') include 'admin.php';
    if($page == 'pegawai') include 'pegawai.php';
    if($page == 'makanan') include 'makanan.php';
    if($page == 'minuman') include 'minuman.php';
    if($page == 'uang-masuk') include 'uangMasuk.php';
    if($page == 'uang-keluar') include 'uangKeluar.php';
    if($page == 'member') include 'member.php';