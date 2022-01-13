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
                    <h1 class="mt-4">Data Peminjam</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pgwmodal">
                                Tambah Peminjam
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>nik</th>
                                            <th>nama</th>
                                            <th>jenis kelamin</th>
                                            <th>alamat</th>
                                            <th>no telp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tampilpeminjam = mysqli_query($conn, "SELECT * FROM `peminjam`");
                                        while ($data = mysqli_fetch_array($tampilpeminjam)) {
                                            $nik = $data['nik'];
                                            $nama = $data['nama'];
                                            $jenis_kelamin = $data['jenis_kelamin'];
                                            $alamat = $data['alamat'];
                                            $no_telp = $data['no_telp'];
                                        ?>
                                            <tr>
                                                <td><?= $nik; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $jenis_kelamin; ?></td>
                                                <td><?= $alamat; ?></td>
                                                <td><?= $no_telp; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatepmj<?= $nik; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletepmj<?= $nik; ?>">Delete</button>
                                                </td>
                                            </tr>

                                            <!-- UPDATE -->
                                            <div class="modal fade" id="updatepmj<?= $nik; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Peminjam</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="nik" value="<?= $nik; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="nama" value="<?= $nama; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="jenis_kelamin" value="<?= $jenis_kelamin; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="alamat" value="<?= $alamat; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="no_telp" value="<?= $no_telp; ?>" class="form-control">
                                                                <br />
                                                                <input type="hidden" name="nik" value="<?= $nik; ?>">
                                                                <br />
                                                                <button type="submit" name="updatepmj" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- UPDATE -->

                                            <!-- DELETE -->
                                            <div class="modal fade" id="deletepmj<?= $nik; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                Apakah anda ingin menghapus data peminjam ini? &nbsp; &nbsp;
                                                                <input type="hidden" name="nik" value="<?= $nik ?>">
                                                                <button type="submit" name="deletepmj" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- DELETE-->

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
<div class="modal fade" id="pgwmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="text" name="nik" placeholder="nik" class="form-control">
                    <br />
                    <input type="text" name="nama" placeholder="nama" class="form-control">
                    <br />
                    <input type="text" name="jenis_kelamin" placeholder="jenis_kelamin" class="form-control">
                    <br />
                    <input type="text" name="alamat" placeholder="alamat" class="form-control">
                    <br />
                    <input type="text" name="no_telp" placeholder="no_telp" class="form-control">
                    <br />
                    <button type="submit" name="insertpmj" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- INSERT -->
</html>
