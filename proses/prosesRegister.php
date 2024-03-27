<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirm = md5($_POST['confirm-password']);

    
        if($password == $confirm){
            mysqli_query($koneksi, "INSERT INTO admin(username,password, nama) VALUES('$username', '$password','$nama')");

            echo "
            <script>
                window.location = 'login.php';
            </script>";
        }

        else{
            echo "
            <script>
                alert('password dan password konfirmasi tidak sama!');
            </script>";
        }
    }
