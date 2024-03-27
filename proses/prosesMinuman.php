<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama-minuman'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $resep = $_POST['resep'];

        $sql = mysqli_query($koneksi, "INSERT INTO minuman(nama_minuman, harga, stok, resep) VALUES('$nama', '$harga', '$stok', '$resep')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=minuman';
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
        $nama = $_POST['nama-minuman'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $resep = $_POST['resep'];

        $sql = mysqli_query($koneksi, "UPDATE minuman SET
            nama_minuman = '$nama',
            harga = '$harga',
            stok = '$stok',
            resep = '$resep'
            WHERE id_minuman = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=minuman';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM minuman where id_minuman='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=minuman';
        </script>";
    }
}