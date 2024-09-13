<?php
session_start();
require 'connection.php';
$sql = 'SELECT * FROM tb_siswa';
$result = $conn->query($sql);
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <!-- Navigation -->
  <?php include '../component/navbar.php'; ?>

  <!-- Judul -->
  <div class="container mt-3">
    <h1 class="text-uppercase fw-bold text-primary">Data Siswa</h1>
    <figure>
      <blockquote class="blockquote">
        <p>Berisi data yang telah di simpan di database.</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        CRUD <cite title="Source Title">Create Read Update Delete</cite>
      </figcaption>
    </figure>
    <a href="kelola.php" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambahkan Data</a>
    <?php
    if (isset($_SESSION["execute"])):
    ?>
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <div>
          <i class="fa-solid fa-circle-check"></i>
          <?php echo $_SESSION["execute"]; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
    session_destroy();
    endif
    ?>
    <div class="table-responsive">
      <?php
      if ($result->num_rows > 0) {
      ?>
        <table class="table align-middle table-bordered mt-2">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">NISN</th>
              <th scope="col">Nama Siswa</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Foto Siswa</th>
              <th scope="col">Alamat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $id = $row['id_siswa'];
                $nisn = $row['nisn'];
                $nama_siswa = $row['nama_siswa'];
                $jenis_kelamin = $row['jenis_kelamin'];
                $foto = $row['foto_siswa'];
                $alamat = $row['alamat'];
                ++$no;
                echo "<tr>
            <th scope='row'>$no</th>
            <td>$nisn</td>
            <td>$nama_siswa</td>
            <td>$jenis_kelamin</td>
            <td><img src='./img/$foto'></img></td>
            <td>$alamat</td>
            <td>
              <div>
                <a href='kelola.php?ubah=$nisn' type='button' class='btn btn-success'><i class='fa-solid fa-pen-to-square'></i></a>
                <button type='button' data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-danger'><i class='fas fa-trash'></i></button>
              </div>
            </td>
          </tr>
          <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered modal-md'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='exampleModalLabel'>Hapus Modal</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
            <div class='modal-body'>
            <p>Apakah anda yakin ingin menghapus data ini?</p>
          </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
          <a href='proses.php?hapus=$id' type='button' class='btn btn-danger'>Hapus</a>
        </div>
      </div>
    </div>";
              }
            }
            ?>
          </tbody>
        </table>
      <?php } else {
        echo "<h2 class='text-center'>Data siswa masih kosong.</h2>";
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>