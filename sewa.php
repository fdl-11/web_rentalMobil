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
                    <h1 class="mt-4">Data Transaksi</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#transaksimodal">
                                Tambah Sewa
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>no_sewa</th>
                                            <th>mobil</th>
                                            <th>type</th>
                                            <th>plat</th>
                                            <th>nama</th>
                                            <th>tanggal pinjam</th>
                                            <th>tanggal kembali</th>
                                            <th>harga</th>
                                            <th>denda</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $viewtransaksi = mysqli_query($conn, "select * from sewa left join mobil on sewa.id_mobil=mobil.id_mobil left join peminjam on sewa.nik=peminjam.nik left join pegawai on sewa.id_pegawai=pegawai.id_pegawai");
                                        while ($data = mysqli_fetch_array($viewtransaksi)) {
                                            $no_sewa = $data['no_sewa'];
                                            $merk = $data['merk'];
                                            $type = $data['type'];
                                            $plat = $data['plat'];
                                            $nama = $data['nama']; 
                                            $tgl_pinjam = $data['tgl_pinjam'];
                                            $tgl_kembali = $data['tgl_kembali'];
                                            $harga = $data['harga'];
                                            $denda = $data['denda'];
                                            $id_mobil = $data['id_mobil'];
                                            $nik = $data['nik'];
                                            $id_pegawai = $data['id_pegawai'];

                                        ?>
                                            <tr>
                                                <td><?= $no_sewa; ?></td>
                                                <td><?= $merk; ?></td>
                                                <td><?= $type; ?></td>
                                                <td><?= $plat; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $tgl_pinjam; ?></td>
                                                <td><?= $tgl_kembali; ?></td>
                                                <td><?= $harga; ?></td>
                                                <td><?= $denda; ?></td>
                                                <td>
                                                <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#updatesewa<?= $no_sewa; ?>">Edit</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletesewa<?= $no_sewa; ?>">Hapus</button>
                                                </td>
                                            </tr>

                                            <!-- UPDATE -->
                                            <div class="modal fade" id="updatesewa<?= $no_sewa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data Transaksi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="no_sewa" value="<?= $no_sewa; ?>" class="form-control">
                                                                <br />
                                                                <select name="id_mobil" class="form-control">
                                                                    <option selected value="<?= $id_mobil; ?>"></option>
                                                                    <?php
                                                                    $tampilanmobil = mysqli_query($conn, "select * from mobil");
                                                                    while ($fetcharray = mysqli_fetch_array($tampilanmobil)) {
                                                                        $id_mobil = $fetcharray['id_mobil'];
                                                                    ?>
                                                                        <option value="<?= $id_mobil; ?>"><?= $id_mobil; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            
                                                                <br />
                                                                <select name="nik" class="form-control">
                                                                    <option selected value="<?= $nik; ?>"></option>
                                                                    <?php
                                                                    $tampilanpeminjam = mysqli_query($conn, "select * from peminjam");
                                                                    while ($fetcharray = mysqli_fetch_array($tampilanpeminjam)) {
                                                                        $nama = $fetcharray['nama'];
                                                                        $nik = $fetcharray['nik'];
                                                                    ?>
                                                                        <option value="<?= $nik; ?>"><?= $nama; ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br />
                                                                <input type="text" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="tgl_kembali" value="<?= $tgl_kembali; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="harga" value="<?= $harga; ?>" class="form-control">
                                                                <br />
                                                                <input type="text" name="denda" value="<?= $denda; ?>" class="form-control">
                                                                <br />
                                                                <input type="hidden" name="no_sewa" value="<?= $no_sewa; ?>">
                                                                <button type="submit" name="updatesewa" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- UPDATE -->

                                            <!-- DELETE -->
                                            <div class="modal fade" id="deletesewa<?= $no_sewa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                Apakah anda ingin menghapus data transaksi ini?
                                                                <input type="hidden" name="no_sewa" value="<?= $no_sewa; ?>">
                                                                <button type="submit" name="deletesewa" class="btn btn-danger">Hapus</button>
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

<!-- Modal -->
<div class="modal fade" id="transaksimodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="text" name="no_sewa" placeholder="no_sewa" class="form-control">
                    <br />
                    <select name="id_mobil" class="form-control">
                        <option selected value="<?= $id_mobil; ?>">pilih mobil</option>
                        <?php
                        $tampilanmobil = mysqli_query($conn, "select * from mobil");
                        while ($fetcharray = mysqli_fetch_array($tampilanmobil)) {
                            $id_mobil = $fetcharray['id_mobil'];
                        ?>
                            <option value="<?= $id_mobil; ?>"><?= $id_mobil; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <select name="nik" class="form-control">
                        <option selected value="<?= $nik; ?>">pilih peminjam</option>
                        <?php
                        $tampilanpmj = mysqli_query($conn, "select * from peminjam");
                        while ($fetcharray = mysqli_fetch_array($tampilanpmj)) {
                            $nama = $fetcharray['nama'];
                            $nik = $fetcharray['nik'];
                        ?>
                            <option value="<?= $nik; ?>"><?= $nama; ?></option>

                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <input type="text" name="tgl_pinjam" placeholder="tgl_pinjam" class="form-control">
                    <br />
                    <input type="text" name="tgl_kembali" placeholder="tgl_kembali" class="form-control">
                    <br />
                    <input type="number" name="denda" placeholder="denda" class="form-control">
                    <br />
                    <input type="number" name="harga" placeholder="harga" class="form-control">
                    <br />
                    <button type="submit" name="insertsewa" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>
