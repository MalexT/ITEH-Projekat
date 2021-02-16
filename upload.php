<?php
$target_dir = "fajlovi/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  header("Location:fajlovi.php");
}else{
  echo "GRESKA";
}

 ?>
