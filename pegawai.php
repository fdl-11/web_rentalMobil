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
                    <h1 class="mt-4">Data Pegawai</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pgwmodal">
                                Tambah Pegawai
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id_pegawai</th>
                                            <th>nama_pegawai</th>
                                            <th>jobdesk</th>
                                            <th>no_telp</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tampilpgw = mysqli_query($conn, " SELECT * FROM `pegawai`");
                                        while ($data = mysqli_fetch_array($tampilpgw)){
                                            $id_pegawai = $data['id_pegawai'];
                                            $nama_pegawai = $data['nama_pegawai'];
                                            $jobdesk = $data['jobdesk'];
                                            $no_telp = $data['no_telp'];
                                        ?>
                                            <tr>
                                                <td><?= $id_pegawai; ?></td>
                                                <td><?= $nama_pegawai; ?></td>
                                                <td><?= $jobdesk; ?></td>
                                                <td><?= $no_telp; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatepegawai<?= $id_pegawai; ?>">Edit</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletepegawai<?= $id_pegawai; ?>">Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- modal update pegawai -->
                                            <div class="modal fade" id="updatepegawai<?= $id_pegawai; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Karyawan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="id_pegawai" value="<?= $id_pegawai; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="nama_pegawai" value="<?= $nama_pegawai; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="jobdesk" value="<?= $jobdesk; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="no_telp" value="<?= $no_telp; ?>" class="form-control">
                                                                <br />
                                                                <input type="hidden" name="id_pegawai" value="<?= $id_pegawai; ?>">
                                                                <br />
                                                                <button type="submit" name="updatepegawai" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal update pegawai -->

                                            <!-- delete modal pegawai -->
                                            <div class="modal fade" id="deletepegawai<?= $id_pegawai; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                Apakah anda ingin menghapus data ini?
                                                                <input type="hidden" name="id_pegawai" value="<?= $id_pegawai ?>">
                                                                <button type="submit" name="deletepegawai" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete modal pegawai-->

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

<!-- Modal -->
<div class="modal fade" id="pgwmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="text" name="id_pegawai" placeholder="id_pegawai" class="form-control">
                    <br />
                    <input type="text" name="nama_pegawai" placeholder="nama_pegawai" class="form-control">
                    <br />
                    <input type="text" name="jobdesk" placeholder="jobdesk" class="form-control">
                    <br />
                    <input type="text" name="no_telp" placeholder="no_telp" class="form-control">
                    <br />
                    <button type="submit" name="addpegawai" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>
