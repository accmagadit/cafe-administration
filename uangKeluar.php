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
            $uangKeluar = mysqli_query($koneksi, "SELECT * FROM uang_keluar");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Uang Keluar</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=uang-keluar&task=input" class="btn btn-primary">Input Data Uang Keluar</a>
            </div>
            <table class="table table-bordered table-hover table-responsive">
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jumlah Uang</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($uangKeluar as $row) : ?>
                <tr>
                    <td> <?= $row["id_transaksi"]; ?></td>
                    <td> <?= $row["nama_transaksi"]; ?></td>
                    <td> <?= $row["tanggal_transaksi"]; ?></td>
                    <td> <?= $row["jumlah_uang"]; ?></td>
                    <td> <?= $row["keterangan"]; ?></td>
                    <td>
                        <a href="index.php?page=uang-keluar&task=edit&id_edt=<?= $row["id_transaksi"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesUangKeluar.php?task=delete&id_hps=<?= $row["id_transaksi"]; ?>"
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

                    $edit = mysqli_query($koneksi, "SELECT * FROM uang_keluar WHERE id_transaksi='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Data Uang Keluar</h2>
            <a href="index.php?page=uang-keluar">Lihat data</a>
            <div class="row">
                <form action="proses/prosesUangKeluar.php?task=edit&id_edt=<?=$_GET['id_edt'];?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Transaksi</label>
                    <input type="text" class="form-control" name="nama-transaksi" value="<?=$data['nama_transaksi'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" value="<?=$data['tanggal_transaksi'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Uang</label>
                    <input type="number" class="form-control" name="jumlah-uang" value="<?=$data['jumlah_uang'];?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea rows="3" name="keterangan" class="form-control"><?=$data['keterangan'];?></textarea>
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
            <h2>Form Input Data Uang Keluar</h2>
            <a href="index.php?page=uang-keluar">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesUangKeluar.php?task=input" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Transaksi</label>
                    <input type="text" class="form-control" name="nama-transaksi">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Uang</label>
                    <input type="number" class="form-control" name="jumlah-uang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea rows="3" name="keterangan" class="form-control"></textarea>
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