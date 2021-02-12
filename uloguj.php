<?php
include 'glavnaSesija.php';
include 'konekcija.php';

$username = $_POST['username'];
$password = $_POST['password'];

if(Instruktor::ulogujMe($konekcija,$username,$password)){
  header("Location:index.php");
}else{
  header("Location:login.php");
}
 ?>
