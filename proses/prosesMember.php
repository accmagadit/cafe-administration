<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $tipe = $_POST['tipe'];
        $makanan = $_POST['makanan-diskon'];
        $minuman = $_POST['minuman-diskon'];

        $sql = mysqli_query($koneksi, "INSERT INTO member(nama_member, tipe, makanan_diskon, minuman_diskon) VALUES('$nama', '$tipe', '$makanan', '$minuman')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=member';
            </script>";
        }

        else{
            echo "<script>
                alert('data gagal disimpan!');
            </script>";
        }
    }
}

elseif($_GET['task'] == 'edit') {
    if(isset($_POST['submit'])){
        $nama = $_POST['nama-member'];
        $tipe = $_POST['tipe'];
        $makanan = $_POST['makanan-diskon'];
        $minuman = $_POST['minuman-diskon'];

        $sql = mysqli_query($koneksi, "UPDATE member SET
            nama_member = '$nama',
            tipe = '$tipe',
            makanan_diskon = '$makanan',
            minuman_diskon = '$minuman'
            WHERE id_member = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=member';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM member where id_member='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=member';
        </script>";
    }
}