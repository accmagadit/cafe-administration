<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $password = md5($_POST['password']);
    $login = mysqli_query($koneksi, "SELECT * FROM admin where username = '$_POST[username]' and password='$password'");
    $hasil_login = mysqli_num_rows($login);
    $data_login = mysqli_fetch_array    ($login);

    if($hasil_login>0){
        session_start();
        $_SESSION['user'] = $data_login['username'];
        $_SESSION['level'] = $data_login['level'];
        header('location:index.php?page=home');
    }
}