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
            $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Pegawai</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=pegawai&task=input" class="btn btn-primary">Input Data Pegawai</a>
            </div>
            <table class="table table-bordered  table-hover table-responsive">
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Jabatan</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                    
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($pegawai as $row) : ?>
                <tr>
                    <td> <?= $row["id_pegawai"]; ?></td>
                    <td> <?= $row["jabatan"]; ?></td>
                    <td> <?= $row["nama_depan"]; ?></td>
                    <td> <?= $row["nama_belakang"]; ?></td>
                    <td> <?= $row["no_telp"]; ?></td>
                    <td> <?= $row["alamat"]; ?></td>
                    <td>
                        <a href="index.php?page=pegawai&task=edit&id_edt=<?= $row["id_pegawai"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesPegawai.php?task=delete&id_hps=<?= $row["id_pegawai"]; ?>"
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

                    $edit = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Pegawai</h2>
            <a href="index.php?page=pegawai">Lihat data</a>
            <div class="row">
                <form action="proses/prosesPegawai.php?task=edit&id_edt=<?=$_GET['id_edt']?>;" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" name="nama-depan" value="<?= $data['nama_depan']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" name="nama-belakang" value="<?= $data['nama_belakang']; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <div class="row g-2">
                        <select name="jabatan" id="" class="form-select">
                            <option value="<?=$data['jabatan']?>;" selected><?=$data['jabatan']?></option>
                            <option value="supervisor">Supervisor</option>
                            <option value="koki">Koki</option>
                            <option value="kasir">Kasir</option>
                            <option value="pelayan">Pelayan</option>
                            <option value="keamanan">Keamanan</option>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No Telp</label>
                        <input type="number" class="form-control" name="no-telp" value="<?= $data['no_telp']; ?>">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" cols="9"><?= $data['alamat'];?></textarea>
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
            <h2>Form Input Pegawai</h2>
            <a href="index.php?page=pegawai">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesPegawai.php?task=input" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Depan</label>
                    <input type="text" class="form-control" name="nama-depan">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama-belakang">
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <div class="row g-2">
                        <select name="jabatan" id="" class="form-select">
                            <option value="" selected>--Jabatan--</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="koki">Koki</option>
                            <option value="kasir">Kasir</option>
                            <option value="pelayan">Pelayan</option>
                            <option value="keamanan">Keamanan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Telp</label>
                    <input type="number" class="form-control" name="no-telp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea rows="3" name="alamat" class="form-control"></textarea>
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