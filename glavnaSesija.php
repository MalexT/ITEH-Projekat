<?php
  include 'domen/uloga.php';
  include 'domen/instruktor.php';
  session_start();

  if(!isset($_SESSION['instruktor'])){
    if(!isset($_POST['login'])){
      header("Location:login.php");
    }

  }

 ?>
