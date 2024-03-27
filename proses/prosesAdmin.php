<?php
include '../koneksi.php';
if($_GET['task'] == 'edit'){
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        if($password == $confirm_password){
            $sql = mysqli_query($koneksi, "UPDATE admin SET 
                nama = '$nama',
                password = MD5('$password')
                WHERE username = '$username'");
    
            if($sql){    
                echo "
                <script>
                    window.location = '../index.php?page=admin';
                </script>";
                } 

        }
        else{
            echo "
                <script>
                    alert('data gagal disimpan, samakan password dan konfirm !');
                    window.location = '../index.php?page=admin&task=edit&id_edt=$username';
                </script>";
        }
    }

}

else{
    //delete
    $hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE username ='$_GET[id_hps]'");

    if ($hapus) {
        # code...
        echo "
            <script>
                alert('Data Berhasil Dihapus !');
                document.location.href = '../index.php?page=admin';
            </script>";
    }
    else{
        echo "kok gagal?";
    }
}