<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login/login.php");

$SQL = "SELECT mahasiswa.nama, nilai.mata_kuliah, nilai.id, nilai.nilai, nilai.huruf FROM mahasiswa INNER JOIN nilai ON mahasiswa.id = nilai.id_mhs";
$query_results = mysqli_query($conn, $SQL);
$rows = [];

while ( $row = mysqli_fetch_assoc($query_results) ) 
{
  $rows[] = $row;
}


?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	
	<link rel="stylesheet" href="../../src/index.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    
    <script type="text/javascript" charset="utf-8">
      $(document).ready( function () {
        $('#table_id').DataTable({
          'scrollX': true
        });
      });
    </script>
   
   <title>Sistem Penilaian Mahasiswa - Kelola Data Nilai</title>
  </head>
  <body>

  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Penilaian Mahasiswa</a>
    </div>
  </nav>
  
  <main class="container-md">
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Kelola Data Nilai</h2>
      <p>Data Nilai meliputi nama mahasiswa, mata kuliah, nilai, dan huruf nilai</p>
      <hr class="my-2" />
      </button>
    </section>
    <button class="btn btn-success px-3 rounded mb-5" data-bs-toggle="modal" data-bs-target="#modal-create">
      <i class="fa-solid fa-plus"></i> Tambah Data
    </button>
<?php

if (isset( $_GET["res"] ))
{
  switch ($_GET["res"]) {
  case 1 :
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>berhasil dilakukan!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  case 0 : 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Action failed!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  }
}

?>
    <!-- Table -->
    <section class="container md:d-flex justify-content-center gap-3"> 
      <table id="table_id" class="table table-striped" style="width: 100%;">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Mata Kuliah</td>
            <td>Nilai</td>
            <td>grade</td>
            <td>Aksi</td>
          </tr>
        </thead>
      <tbody>
<?php
$num = 0;
foreach($rows as $row) {
  // Parse array
  $id = $row["id"];
  $mata_kuliah = $row["mata_kuliah"];
  $nama = $row["nama"];
  $nilai = $row["nilai"];
  $huruf = $row["huruf"];
  $num++;
  echo <<<EOT
    <tr>
      <td>$num</td>
      <td>$nama</td>
      <td>$mata_kuliah</td>
      <td>$nilai</td>
      <td>$huruf</td>
      <td class="flex gap-2">
        <a href="./update.php?id=$id" class="btn btn-success"><i class="fa-solid fa-edit"></i></a>
        <a href="./delete.php?id=$id" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
  EOT;
}
?>
        <tbody>
      </table>
        <div class="modal-footer">
          <a href="../../index.php" class="btn btn-warning">Kembali</a>
        </div>
    </section>
  </main>

  <!-- Modals -->
<!-- Create -->
  <div class="modal fade" id="modal-create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="form-create" action="./create.php" method="POST" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Create Data --> 
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <select class="form-select" name="id_mhs" required>
<?php

$SQL = "SELECT mahasiswa.nama, mahasiswa.nim, mahasiswa.id FROM mahasiswa";
$query_results = mysqli_query($conn, $SQL);

while ( $row = mysqli_fetch_assoc($query_results) )
{
  // parse array
  $id = $row["id"];
  $nama = $row["nama"];
  $nim = $row["nim"];

  echo <<<EOT
    <option value="$id">$nim - $nama</option>
EOT;
}

?>
            </select>
          </div> 
          <div class="mb-3">
            <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
            <select name="mata_kuliah" class="form-select" required>
              <option value="RPL">RPL</option>
              <option value="PBO 2">PBO 2</option>
              <option value="Visual 1">Visual 1</option>
              <option value="Jaringan Komputer">Jaringan Komputer</option>
            </select>
          </div> 
          <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input class="form-control" type="number" name="nilai" placeholder="Masukkan nilai" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success" name="create">Submit</button>
        </div>
      </form>
    </div>
  </div>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
