<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .text-center{
        background-color: #39B5E0;
      }

      .form-signin{
        box-shadow: 20px 20px #A0C3D2;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .register{
        text-align:right;
        margin-right:20px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/sign-in.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="gambar">
            <img src="gambar/login gambar.jpg" alt="" style="width:855px;;">
        </div>
        <main class="form-signin w-100 h-100 m-auto">
            <form method="post" action="">
                <h1 class="h3 mb-3 fw-normal" style="color: #0078AA; font-family: 'Roboto', sans-serif; font-size:30px;">Admin Tiada Cafe</h1><br>

                <div class="form-floating">
                    <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="nama">
                    <label for="floatingInput">Nama</label>
                </div><br>

                <div class="form-floating">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="username">
                    <label for="floatingInput">Username</label>
                </div><br>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                
                <div class="form-floating">
                    <input type="password" name="confirm-password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div><br>
                
                <button class="w-100 btn btn-lg btn-primary" name=submit type="submit">Register</button><br>
                <div class="register"><br>
                    <a href="login.php" text-align="center">Already have Account?</a>
                </div>
            </form>
        </main>
        <?php
          include 'proses/prosesRegister.php'
        ?>
    </body>
</html>
