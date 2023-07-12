<?php
session_start();
require "../koneksi/koneksi.php";

if ( isset($_SESSION["login"]) ) header ("Location: ../index.php");

if ( isset($_POST["login"]) )
{
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $SQL = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  $query_results = mysqli_query($conn, $SQL);

  if ( mysqli_num_rows($query_results) > 0 ) {
    $_SESSION["login"] = true;
    header ("Location: ../index.php");
  }
  else echo '<main><div class="alert alert-danger">';
  echo '<strong>Gagal Login !<br></strong>Periksa ulang Username dan Password</div></main>';
  header("");
}

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>  
	<link rel="stylesheet" href="../css/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

   <title>Sistem Penilaian Mahasiswa - Admin Login</title>
  </head>
  <body>
<?php

if (isset( $_GET["res"] ))
{
  switch ($_GET["res"]) {
  case 2 :
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>You Must Login!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  case 0 : 
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Login failed!</strong> please check your password or username<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    break;
  }
}

?>
 
        <div class="vh-100 d-flex justify-content-center align-items-center ">
            <div class="col-md-5 p-5 shadow-sm border rounded-5 border-success bg-white mt-1">
                <center><img src="../gambar/UNISKA.png" id="logo-uniska-login" alt="logo_uniska"></center>
                <h2 class="text-center mb-4 text-success">Login Form</h2>
                <form action="" method="POST">
                <?php if (isset($error)): ?>
						<div class="error">
							<?php echo $error ?>
						</div>
					<?php endif; ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control border border-success" name="username" id="username" aria-describedby="textHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control border border-success" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-success" name="login" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
