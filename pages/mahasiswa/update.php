<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login/login.php");

if ( isset($_GET["id"]) )
{
  // Get id
  $id = $_GET["id"];
  $SQL = "SELECT * FROM mahasiswa WHERE id = $id";
  $rows = [];

  $query_results = mysqli_query($conn, $SQL);
  while ( $row = mysqli_fetch_assoc($query_results) ) $rows[] = $row;

}

if ( isset($_POST["update"]) )
{
  //parse array
  $id = $_POST["id"];
  $NIM = $_POST["NIM"];
  $nama = $_POST["nama"];
  $program_studi = $_POST["program_studi"];
  $no_hp = $_POST["no_hp"];

  $SQL = "UPDATE mahasiswa SET NIM = '$NIM', nama = '$nama', program_studi = '$program_studi', no_hp = '$no_hp' WHERE id = $id";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}

?>
<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<!-- Font Awesome 6 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	
	<!-- App css -->
	<link rel="stylesheet" href="../../src/index.css">

	<!-- Poppins Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Update Data Mahasiswa</title>
  </head>
  <body>

  <!-- Nav Bar -->
  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="../../index.php">Data Mahasiswa</a>
    </div>
  </nav>

  <main class="container-md">
    <!-- Jumbotron -->
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <h2>Update Data Mahasiswa</h2>
      <p>Data meliputi NIM, nama, program studi, dan No HP</p>
      <hr class="my-2" />
      </button>
    </section>
    <!-- Jumbotron -->

    <!-- Menu -->
    <section class="container-md">
      <form id="form-create" action="./update.php" method="POST" class=""> 
        <!-- Form update Data --> 
<?php
// Parse array 
$nama = $rows[0]["nama"];
$NIM = $rows[0]["NIM"];
$program_studi = $rows[0]["program_studi"];
$no_hp = $rows[0]["no_hp"];

echo <<<EOT
        <input type="hidden" name="id" value="$id">
        <div class="mb-3">
          <label for="NIM" class="form-label">NPM</label>
          <input type="number" class="form-control" name="NIM" maxlength="15" required value="$NIM">
        </div> 
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input type="text" class="form-control" name="nama" maxlength="40" required value="$nama">
        </div> 
        <div class="mb-3">
          <label for="program_studi" class="form-label">Program Studi</label>
          <input type="text" class="form-control" name="program_studi" maxlength="30" required value="$program_studi">
        </div>
        <div class="mb-3">
          <label for="no_hp" class="form-label">no hp</label>
          <input type="number" class="form-control" name="no_hp" maxlength="2" required value="$no_hp">
        </div> 
        
      </div>
      <div class="modal-footer">
      <a href="../mahasiswa" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-success" name="update">Update</button>
      </div>
EOT;
?>
      </form>
    </section>
  </main>
   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
