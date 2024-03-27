<?php
include '../koneksi.php';

if($_GET['task'] == 'input'){
    if(isset($_POST['submit'])){
        $namaDepan = $_POST['nama-depan'];
        $namaBelakang = $_POST['nama-belakang'];
        $jabatan = $_POST['jabatan'];
        $noTelp = $_POST['no-telp'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "INSERT INTO pegawai(nama_depan, nama_belakang, jabatan, no_telp, alamat) VALUES('$namaDepan', '$namaBelakang', '$jabatan', '$noTelp', '$alamat')");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pegawai';
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
        $namaDepan = $_POST['nama-depan'];
        $namaBelakang = $_POST['nama-belakang'];
        $jabatan = $_POST['jabatan'];
        $noTelp = $_POST['no-telp'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($koneksi, "UPDATE pegawai SET
            nama_depan = '$namaDepan',
            nama_belakang = '$namaBelakang',
            jabatan = '$jabatan',
            no_telp = '$noTelp',
            alamat = '$alamat'
            WHERE id_pegawai = '$_GET[id_edt]';
        ");

        if($sql){
            echo "<script>
                window.location = '../index.php?page=pegawai';
            </script>";
        }
        else{
            echo "kok gagal bro";
        }
    }
}

elseif($_GET['task'] == 'delete'){
    $sql = mysqli_query($koneksi, "DELETE FROM pegawai where id_pegawai='$_GET[id_hps]'");

    if($sql){
        echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location = '../index.php?page=pegawai';
        </script>";
    }
}