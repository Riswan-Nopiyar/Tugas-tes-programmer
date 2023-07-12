<?php
session_start();
if ( empty($_SESSION["login"]) ) header ("Location: ./login/login.php");

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	<link rel="stylesheet" href="css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Beranda</title>
   <link rel="icon" type="image/x-icon" href="gambar/UNISKA.png">
  </head>
  <body>


  <nav class="navbar navbar-light bg-success">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="./index.php"><img src="gambar/UNISKA.png" id="logo-uniska-nav"> Mahasiswa Uniska</a>
    </div>
    <div class="position-absolute top-0 end-0 mt-3">
      <a class="px-3 btn btn-danger" href="pages/admin/logout.php">Log Out</a>
    </div>
  </nav>

  <main class="container-md">
    <section class="p-4 shadow-4 rounded-3 bg-white text-center px-5 pt-5">
      <img src="gambar/UNISKA.png" id="logo-uniska-beranda">
      <h2>Selamat Datang</h2>
      <p>Di Penilaian Mahasiswa UNISKA</p>
      <hr class="my-2" />
      </button>
    </section>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>



  <div class="row">
    <div class="col-sm-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Kelola Data Admins</h5>
          <i class='fas fa-user-circle' style='font-size:58px;color:#019109'></i>
          <p class="card-text">Data admin berisi tentang username dan password</p>
          <a href="pages/admin" class="btn btn-success">Masuk</a>
        </div>
      </div>
      </div>
  
    <div class="col-sm-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Data Nilai</h5>
          <i class='fas fa-id-card' style='font-size:58px;color:#019109'></i>
          <p class="card-text">Data nilai tentang nama mahasiswa, mata kuliah, nilai dan grade</p>
          <a href="pages/nilai" class="btn btn-success">Masuk</a>
        </div>
      </div>
    </div>

      <div class="col-sm-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">Data Mahasiswa Detail</h5>
          <i class='fas fa-users' style='font-size:58px;color:#019109'></i>
          <p class="card-text">Data mahasiswa berisi tentang NIM, nama, program studi, dan No HP</p>
          <a href="pages/mahasiswa" class="btn btn-success">Masuk</a>
        </div>
      </div>
      </div>     

    

 
  </div>
</main>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>