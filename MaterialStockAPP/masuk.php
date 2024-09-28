<?php

require 'function.php';
require 'logincheck.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Material Stock</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Utama</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></i></div>
                            Stock Barang
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-packing"></i></i></div>
                            Barang Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-outdent"></i></i></div>
                            Barang Keluar
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Barang Masuk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Tampilan Data Barang Masuk</li>
                    </ol>
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalform">+ Masukkan Barang Masuk</button>
                    <div class="card mb-5">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Barang Masuk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Penerima</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>Barang Masuk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Penerima</th>
                                        <th>Total</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $masuk = mysqli_query($conn, "SELECT * FROM masuk");
                                    $id = 1;
                                    foreach ($masuk as $row) : ?>
                                        <?php

                                        $namaBarang = $row['id_barang'];
                                        $hasilNamaBarang = mysqli_query($conn, "SELECT * FROM stock WHERE id_barang='$namaBarang'");
                                        $hasilNamaBarangArray = mysqli_fetch_array($hasilNamaBarang);
                                        ?>
                                        <tr>
                                            <td><?php echo $id++ ?></td>
                                            <td><?php echo $hasilNamaBarangArray['namabarang']; ?></td>
                                            <td><?php echo $row['tanggal']; ?></td>
                                            <td><?php echo $row['keterangan']; ?></td>
                                            <td><?php echo $row['qty']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Barang Masuk</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="barangOption" class="form-label">Barang</label>
                                        <select name="barangMasuk" id="" class="form-control">
                                            <?php
                                            $selectAllData = mysqli_query($conn, "SELECT * FROM stock");
                                            while ($fetchArray = mysqli_fetch_array($selectAllData)) {
                                                $namabarangOption = $fetchArray["namabarang"];
                                                $idbarang = $fetchArray["id_barang"];
                                            ?>
                                                <option value="<?php echo $idbarang; ?>"><?php echo $namabarangOption ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="namabarang" class="form-label">Penerima</label>
                                        <input type="text" class="form-control" required id="penerima" name="penerima" placeholder="Masukkan Nama Penerima">
                                    </div>

                                    <div class="mb-3">
                                        <label for="qtyIn" class="form-label">Jumlah Barang Masuk</label>
                                        <input type="number" min="0" max="255" required class="form-control" id="qtyIn" name="qtyIn"></input>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-success" name="barangIn">+ Simpan Perubahan Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>