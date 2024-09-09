<link rel="stylesheet" href="">
<!-- Navigation -->
<?php
include '../component/navbar.php';
?>

<div class="container mt-5">
  <h2 class="mb-4 fw-bold text-primary">Tambah/Edit Data Siswa</h2>
  <!-- NISN -->
  <div class="mb-3">
    <label for="nisn" class="form-label">NISN</label>
    <input
      type="text"
      id="nisn"
      class="form-control"
      placeholder="Masukkan NISN..." />
  </div>
  <!-- Nama -->
  <div class="mb-3">
    <label for="Nama" class="form-label">Nama</label>
    <input
      type="text"
      id="Nama"
      class="form-control"
      placeholder="Masukkan Nama Siswa/i" />
  </div>
  <!-- Jenis Kelamin -->
  <div class="mb-3">
    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
    <select id="jeniskelamin" class="form-select">
      <option selected>Pilih Jenis Kelamin</option>
      <option value="1">Laki-laki</option>
      <option value="2">Perempuan</option>
    </select>
  </div>
  <!-- Foto Siswa -->
  <div class="mb-3">
    <label for="fotosiswa" class="form-label">Pilih Foto Siswa</label>
    <input class="form-control" type="file" id="fotosiswa" />
  </div>
  <!-- Alamat -->
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" id="alamat" rows="3"></textarea>
  </div>
  <div class="d-flex gap-2">
    <?php 
      if(isset($_GET['ubah'])){
        ?>
    <a type="button" class="btn btn-primary"><i class="fa-solid fa-check"></i> Ubah Data</a>
        <?php
      } else {
       ?>
    <a type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambahkan Data</a>
        <?php
      }
        ?>
    <a type="button" class="btn btn-danger" href="index.php"><i class="fa-solid fa-xmark"></i> Batal</a>
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