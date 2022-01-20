<?php
require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Record Transaksi</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Database Rental Mobil</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                            <div>
                                <h3 class="sb-sidenav-menu-heading" style="margin-left: 60px;">Welcome</h3>
                                <img src="assets/img/settings.png" alt="" style="margin-left: 70px;">
                            </div>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Mobil
                        </a>
                        <a class="nav-link" href="pegawai.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            Pegawai
                        </a>
                        <a class="nav-link" href="peminjam.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            Peminjam
                        </a>
                        <a class="nav-link" href="sewa.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                            Sewa
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Data Mobil</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">
                                Tambah Mobil
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_mobil</th>
                                            <th>plat</th>
                                            <th>merk</th>
                                            <th>type</th>
                                            <th>jenis</th>
                                            <th>warna</th>
                                            <th>bahan bakar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tampilmobil = mysqli_query($conn, "SELECT * FROM `mobil`");
                                        while ($data = mysqli_fetch_array($tampilmobil)) {
                                            $id_mobil = $data['id_mobil'];
                                            $plat = $data['plat'];
                                            $merk = $data['merk'];
                                            $type = $data['type'];
                                            $jenis = $data['jenis'];
                                            $warna = $data['warna'];
                                            $bahan_bakar = $data['bahan_bakar'];
                                        ?>
                                            <tr>
                                                <td><?= $id_mobil; ?></td>
                                                <td><?= $plat; ?></td>
                                                <td><?= $merk; ?></td>
                                                <td><?= $type; ?></td>
                                                <td><?= $jenis; ?></td>
                                                <td><?= $warna; ?></td>
                                                <td><?= $bahan_bakar; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $id_mobil; ?>">Edit</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $id_mobil; ?>">Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- UPDATE -->
                                            <div class="modal fade" id="modalupdate<?= $id_mobil; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="id_mobil" value="<?= $id_mobil; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="plat" value="<?= $plat; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="merk" value="<?= $merk; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="type" value="<?= $type; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="jenis" value="<?= $jenis; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="warna" value="<?= $warna; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="bahan_bakar" value="<?= $bahan_bakar; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="hidden" name="id_mobil" value="<?= $id_mobil; ?>">
                                                                <br />
                                                                <button type="submit" name="updatemobil" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- UPDATE -->

                                            <!-- DELETE -->
                                            <div class="modal fade" id="modaldelete<?= $id_mobil; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus data mobil ini? &nbsp;&nbsp;
                                                                <input type="hidden" name="id_mobil" value="<?= $id_mobil;?>">
                                                                <button type="submit" name="deletembl" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- DELETE -->

                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

<!-- INSERT -->
<div class="modal fade" id="hpmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="text" name="id_mobil" placeholder="id_mobil" class="form-control" required>
                    <br />
                    <input type="text" name="plat" placeholder="plat" class="form-control" required>
                    <br />
                    <input type="text" name="merk" placeholder="merk" class="form-control" required>
                    <br />
                    <input type="text" name="type" placeholder="type" class="form-control" required>
                    <br />
                    <input type="text" name="jenis" placeholder="jenis" class="form-control" required>
                    <br />
                    <input type="text" name="warna" placeholder="warna" class="form-control" required>
                    <br />
                    <input type="text" name="bahan_bakar" placeholder="bahan_bakar" class="form-control" required>
                    <br />
                    <button type="submit" name="insertmobil" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- INSERT -->
</html>
