<?php
if($_GET['page']=='home'){
            echo "<script>
              document.querySelector('.home').classList.remove('link-dark');
              document.querySelector('.home').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='admin'){
          echo "<script>
              document.querySelector('.admin').classList.remove('link-dark');
              document.querySelector('.admin').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='pegawai'){
          echo "<script>
              document.querySelector('.pegawai').classList.remove('link-dark');
              document.querySelector('.pegawai').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='member'){
          echo "<script>
              document.querySelector('.member').classList.remove('link-dark');
              document.querySelector('.member').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='makanan'){
          echo "<script>
              document.querySelector('.makanan').classList.remove('link-dark');
              document.querySelector('.makanan').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='minuman'){
          echo "<script>
              document.querySelector('.minuman').classList.remove('link-dark');
              document.querySelector('.minuman').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='uang-masuk'){
          echo "<script>
              document.querySelector('.uang-masuk').classList.remove('link-dark');
              document.querySelector('.uang-masuk').classList.add('active');
            </script>";
        }
        elseif($_GET['page']=='uang-keluar'){
          echo "<script>
              document.querySelector('.uang-keluar').classList.remove('link-dark');
              document.querySelector('.uang-keluar').classList.add('active');
            </script>";
        }