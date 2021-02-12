<?php
include 'glavnaSesija.php';
session_destroy();
header("Location:login.php");
 ?>
