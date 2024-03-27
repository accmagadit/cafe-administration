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
            $member = mysqli_query($koneksi, "SELECT * FROM member 
            INNER JOIN makanan on makanan.id_makanan = makanan_diskon
            INNER JOIN minuman on minuman.id_minuman = minuman_diskon");
    ?>

        <div class="container">
            <div class="row ">
                <h2>Data Member</h2>
            </div>
            <div class="col-md-4 mb-2">
                <a href="index.php?page=member&task=input" class="btn btn-primary">Input Data Member</a>
            </div>
            <table class="table table-bordered  table-hover table-responsive">
                <tr class="table-primary">
                    <th>Id</th>
                    <th>Nama Member</th>
                    <th>Tipe</th>
                    <th>Makanan Diskon</th>
                    <th>Minuman Diskon</th>
                    <th>Aksi</th>
                    
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($member as $row) : ?>
                <tr>
                    <td> <?= $row["id_member"]; ?></td>
                    <td> <?= $row["nama_member"]; ?></td>
                    <td> <?= $row["tipe"]; ?></td>
                    <td> <?= $row["nama_makanan"]; ?></td>
                    <td> <?= $row["nama_minuman"]; ?></td>
                    <td>
                        <a href="index.php?page=member&task=edit&id_edt=<?= $row["id_member"]; ?>" class=" btn btn-warning"><span
                                data-feather="edit" class="align-text-bottom">Edit</span></a>
                        <a href="proses/prosesMember.php?task=delete&id_hps=<?= $row["id_member"]; ?>"
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

                    $edit = mysqli_query($koneksi, "SELECT * FROM member WHERE id_member='$_GET[id_edt]'");
                    $data = mysqli_fetch_array($edit);

            ?>
            <h2>Form Edit Member</h2>
            <a href="index.php?page=member">Lihat data</a>
            <div class="row">
                <form action="proses/prosesMember.php?task=edit&id_edt=<?=$_GET['id_edt']?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Member</label>
                        <input type="text" class="form-control" name="nama-member" value="<?= $data['nama_member']; ?>">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <div class="row g-2">
                        <select name="tipe" id="" class="form-select">
                            <option value="biasa">Biasa</option>
                            <option value="vip">VIP</option>
                            <option value="vvip">VVIP</option>
                            <option value="sultan">Sultan</option>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Makanan Diskon</label>
                    <div class="row g-2">
                        <select name="makanan-diskon" id="" class="form-select">
                            <?php
                                $makananDiskon = mysqli_query($koneksi, "SELECT * from makanan");
                                while($data_makanan = mysqli_fetch_array($makananDiskon)){
                                ?>
                                <option value="<?=$data_makanan['id_makanan']?>"><?=$data_makanan['nama_makanan']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Minuman Diskon</label>
                    <div class="row g-2">
                        <select name="minuman-diskon" id="" class="form-select">
                            <?php
                                $minumanDiskon = mysqli_query($koneksi, "SELECT * from minuman");
                                while($data_minuman = mysqli_fetch_array($minumanDiskon)){
                                ?>
                                <option value="<?=$data_minuman['id_minuman']?>"><?=$data_minuman['nama_minuman']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
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
            <h2>Form Input Member</h2>
            <a href="index.php?page=member">Lihat data</a>
            <div class="row"></div>
            <form action="proses/prosesMember.php?task=input" method="post">
            <div class="mb-3">
                        <label class="form-label">Nama Member</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Tipe</label>
                    <div class="row g-2">
                        <select name="tipe" id="" class="form-select">
                            <option selected>--Tipe Member--</option>
                            <option value="biasa">Biasa</option>
                            <option value="vip">VIP</option>
                            <option value="vvip">VVIP</option>
                            <option value="sultan">Sultan</option>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Makanan Diskon</label>
                    <div class="row g-2">
                        <select name="makanan-diskon" id="" class="form-select">
                            <?php
                                $makananDiskon = mysqli_query($koneksi, "SELECT * from makanan");
                                while($data_makanan = mysqli_fetch_array($makananDiskon)){
                                ?>
                                <option value="<?=$data_makanan['id_makanan']?>"><?=$data_makanan['nama_makanan']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Minuman Diskon</label>
                    <div class="row g-2">
                        <select name="minuman-diskon" id="" class="form-select">
                            <?php
                                $minumanDiskon = mysqli_query($koneksi, "SELECT * from minuman");
                                while($data_minuman = mysqli_fetch_array($minumanDiskon)){
                                ?>
                                <option value="<?=$data_minuman['id_minuman']?>"><?=$data_minuman['nama_minuman']?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
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