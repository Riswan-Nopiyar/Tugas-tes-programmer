<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login/login.php");

$SQL = "SELECT * FROM mahasiswa";
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
  <!-- Required meta tags -->
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
   
   <title>Data Mahasiswa - Kelola Data Mahasiswa</title>
  </head>
  <body>

  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Data Mahasiswa</a>
    </div>
  </nav>
  
  <main class="container-md">
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Kelola Data Mahasiswa</h2>
      <p>Data mahasiswa meliputi NIM, nama, program studi, dan Nomer HP</p>
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
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil dilakukan</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  case 0 : 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Berhasil dilakukan</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
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
            <td>NIM</td>
            <td>Nama</td>
            <td>Program Studi</td>
            <td>No HP</td>
          </tr>
        </thead>
      <tbody>
<?php
$num = 0;
foreach($rows as $row) {
  // Parse array
  $id = $row["id"];
  $NIM = $row["NIM"];
  $nama = $row["nama"];
  $program_studi = $row["program_studi"];
  $no_hp = $row["no_hp"];
  $num++;
  echo <<<EOT
    <tr>
      <td>$num</td>
      <td>$NIM</td>
      <td>$nama</td>
      <td>$program_studi</td>
      <td>$no_hp</td>
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
            <label for="NIM" class="form-label">NPM</label>
            <input type="number" class="form-control" name="NIM" required>
          </div> 
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" required>
          </div> 
          <div class="mb-3">
            <label for="program_studi" class="form-label">Program Studi</label>
            <select name="program_studi" required class="form-select">
              <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
              <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
              <option value="S1 - Teknik Mesin">S1 - Teknik Mesin</option>
            </select>
          </div> 
          <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" class="form-control" name="no_hp" required>
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
