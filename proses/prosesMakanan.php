<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama-makanan'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $resep = $_POST['resep'];

        $sql = mysqli_query($koneksi, "INSERT INTO makanan(nama_makanan, harga, stok, resep) VALUES('$nama', '$harga', '$stok', '$resep')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=makanan';
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
        $nama = $_POST['nama-makanan'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $resep = $_POST['resep'];

        $sql = mysqli_query($koneksi, "UPDATE makanan SET
            nama_makanan = '$nama',
            harga = '$harga',
            stok = '$stok',
            resep = '$resep'
            WHERE id_makanan = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=makanan';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM makanan where id_makanan='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=makanan';
        </script>";
    }
}