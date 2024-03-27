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
            $minuman = mysqli_query($koneksi, "SELECT * FROM minuman");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Minuman</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=minuman&task=input" class="btn btn-primary">Input Data Minuman</a>
            </div>
            <table class="table table-bordered table-hover table-responsive">
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Minuman</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Resep</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($minuman as $row) : ?>
                <tr>
                    <td> <?= $row["id_minuman"]; ?></td>
                    <td> <?= $row["nama_minuman"]; ?></td>
                    <td> <?= $row["harga"]; ?></td>
                    <td> <?= $row["stok"]; ?></td>
                    <td> <?= $row["resep"]; ?></td>
                    <td>
                        <a href="index.php?page=minuman&task=edit&id_edt=<?= $row["id_minuman"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesMinuman.php?task=delete&id_hps=<?= $row["id_minuman"]; ?>"
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

                    $edit = mysqli_query($koneksi, "SELECT * FROM minuman WHERE id_minuman='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Minuman</h2>
            <a href="index.php?page=minuman">Lihat data</a>
            <div class="row">
                <form action="proses/prosesMinuman.php?task=edit&id_edt=<?=$_GET['id_edt'];?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Minuman</label>
                    <input type="text" class="form-control" name="nama-minuman" value="<?=$data['nama_minuman'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?=$data['harga'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" value="<?=$data['stok'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Resep</label>
                    <textarea rows="3" name="resep" class="form-control"><?=$data['resep'];?></textarea>
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
    case 'input':
    ?>
    <!-- input -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <div class="container mt-3 ">
        <div class="col-md-4">
            <h2>Form Input Minuman</h2>
            <a href="index.php?page=minuman">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesMinuman.php?task=input" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Minuman</label>
                    <input type="text" class="form-control" name="nama-minuman">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok">
                </div>
                <div class="mb-3">
                    <label class="form-label">Resep</label>
                    <textarea rows="3" name="resep" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="reset" class="btn btn-secondary" name="reset" value="Reset">
                </div>
            </form>

        </div>
    </div>
    </div>
    <?php
        break;
        }?>
    </body>
</html>