<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $nama = $_POST['nama-transaksi'];
        $tanggal = $_POST['tanggal'];
        $jumlahUang = $_POST['jumlah-uang'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($koneksi, "INSERT INTO uang_keluar(nama_transaksi, tanggal_transaksi, jumlah_uang, keterangan) VALUES('$nama', DATE_FORMAT('$tanggal', '%Y-%m-%d'), '$jumlahUang', '$keterangan')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=uang-keluar';
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
        $nama = $_POST['nama-transaksi'];
        $tanggal = $_POST['tanggal'];
        $jumlahUang = $_POST['jumlah-uang'];
        $keterangan = $_POST['keterangan'];

        $sql = mysqli_query($koneksi, "UPDATE uang_keluar SET
            nama_transaksi = '$nama',
            tanggal_transaksi = DATE_FORMAT('$tanggal', '%Y-%m-%d'),
            jumlah_uang = '$jumlahUang',
            keterangan = '$keterangan'
            WHERE id_transaksi = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=uang-keluar';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM uang_keluar where id_transaksi='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=uang-keluar';
        </script>";
    }
}