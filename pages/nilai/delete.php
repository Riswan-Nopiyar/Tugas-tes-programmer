<?php
session_start();
require "../../koneksi/koneksi.php";

if ( empty($_SESSION["login"]) ) header ("Location: ../../login/login.php");

if ( isset( $_GET["id"] ) )
{
  // Get id
  $id = $_GET["id"];
  $SQL = "DELETE FROM nilai WHERE id = $id";
  $query_results = mysqli_query($conn, $SQL);

  if ( !mysqli_error($conn) ) header ("Location: ./index.php?res=1");
  else header ("Location: ./index.php?res=0");
}


?>
