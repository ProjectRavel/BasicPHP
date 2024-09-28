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
                    <h1 class="mt-4">Stock Barang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Tampilan Data Stock Barang</li>
                    </ol>
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalform">+ Tambahkan Barang</button>
                    <div class="card mb-5">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Deksripsi</th>
                                        <th>Stock</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Deksripsi</th>
                                        <th>Stock</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $data = mysqli_query($conn, "SELECT * FROM stock");
                                    $id = 1;
                                    foreach ($data as $row) :
                                        $idbarang = $row['id_barang'];
                                        $namaBarang = $row['namabarang'];
                                        $deskripsi = $row['deskripsi'];
                                        $stock = $row['stock'];
                                    ?>
                                        <tr>
                                            <td><?php echo $id++ ?></td>
                                            <td><?php echo $namaBarang; ?></td>
                                            <td><?php echo $deskripsi; ?></td>
                                            <td><?php echo $stock; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editButton<?php echo $idbarang; ?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteButton">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal Button -->
                                        <div class="modal fade" id="editButton<?php echo $idbarang; ?>" tabindex="-1" aria-labelledby="editButton" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editButton">Edit Barang</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post">
                                                            <div class="mb-3">
                                                                <label for="editNamaBarang" class="form-label">Nama Barang</label>
                                                                <input type="text" class="form-control" required id="editNamaBarang" name="editNamaBarang" placeholder="Baju, Casing, Handphone, dll." value="<?php echo $namaBarang; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="editDeskripsiBarang" class="form-label">Deskripsi Barang</label>
                                                                <textarea class="form-control" id="editDeskripsiBarang" required rows="1" name="editDeskripsiBarang"><?php echo $deskripsi; ?></textarea>
                                                            </div>
                                                            <input type="hidden" value="<?php echo $idbarang; ?>" id="idb" name="idb" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" name="saveEdit">Simpan perubahan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /Modal Button -->
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modalform" tabindex="-1" aria-labelledby="tambahkanBarang" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="tambahkanBarang">Tambahkan Barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="namabarang" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" required id="namabarang" name="nama_barang" placeholder="Baju, Casing, Handphone, dll.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Deskripsi Barang</label>
                                        <textarea class="form-control" id="keterangan" required rows="1" name="deskripsi_barang"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock" class="form-label">Stock Barang</label>
                                        <input type="number" min="0" max="255" required class="form-control" id="stock" name="stock_barang"></input>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-success" name="addItem">+ Tambahkan Barang</button>
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