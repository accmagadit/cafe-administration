<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'koneksi.php';
    $page = isset($_GET['task']) ? $_GET['task'] : 'list';

    switch ($page) {
        case 'list':
    ?>
    <?php
            include 'koneksi.php';
            $admin = mysqli_query($koneksi, "SELECT * FROM admin");
    ?>

        <div class="container">
            <div class="row ">
            <h2>Data Admin</h2>
            </div>
            <table class="table table-bordered  table-hover table-responsive">
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                    
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($admin as $row) : ?>
                <tr>
                    <td> <?= $row["id_admin"]; ?></td>
                    <td> <?= $row["nama"]; ?></td>
                    <td> <?= $row["username"]; ?></td>
                    <td> <?= $row["password"]; ?></td>
                    <td>
                        <a href="index.php?page=admin&task=edit&id_edt=<?= $row["username"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesAdmin.php?task=delete&id_hps=<?= $row["username"]; ?>"
                            onclick="return confirm('Yakin hapus data ?');" class="btn btn-danger"><span
                                data-feather="trash-2" class="align-text-bottom">Hapus</span></a>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach; ?>
            </table>
        </div>
        <?php
        break;

        case 'edit':
        include 'koneksi.php';
        ?>
        <link rel="stylesheet" href="css/bootstrap.min.css">

<body>
    <div class="container mt-3 ">
        <div class="col-md-4">
            <?php
                    include 'koneksi.php';

                    $edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Admin</h2>
            <a href="index.php?page=admin">Lihat data</a>
            <div class="row">
                <form action="proses/prosesAdmin.php?task=edit" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $data['username']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="confirm-password">
                    </div>
                    <div class="mb-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                    </div>
                </form>
                <?php
                
                ?>
            </div>
        </div>
    </div>
    <?php
    break;
} ?>
    </body>
</html>