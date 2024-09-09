<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
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
    <div class="table-responsive mt-2">
      <table class="table align-middle table-bordered">
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
          <tr>
            <th scope="row">1</th>
            <td>2321321</td>
            <td>Aisyami Kayla</td>
            <td>Perempuan</td>
            <td><img src="./img/img1.jpeg" alt="" width="150px" /></td>
            <td>Jl. Pasar Baru</td>
            <td>
              <div>
                <a type="button" class="btn btn-success" href="kelola.php?ubah=1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
              </div>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>3432432</td>
            <td>Ravels Pelski</td>
            <td>Laki-laki</td>
            <td><img src="./img/img2.jpeg" alt="" width="150px" /></td>
            <td>Jl. Pasar Baru</td>
            <td>
              <div>
                <a type="button" class="btn btn-success" href="kelola.php?ubah=1"><i class="fa-solid fa-pen-to-square"></i></a>
                <a type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>