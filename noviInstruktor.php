<?php
  include 'glavnaSesija.php';
  include 'konekcija.php';
  $rezultat = "";
 
  if(isset($_POST['sacuvaj'])){
    $imePrezime = $_POST['imePrezime'];
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    if($konekcija->query("INSERT INTO instruktor(imePrezime,username,password,uloga) VALUES ('$imePrezime','$username','$password','1')")){
      $rezultat = "Uspesno unet instruktor";
    }else{
      $rezultat = "Neuspesno unet instruktor";
    }
  }



 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Informacioni sistem za osposobljavanje kandidata za vozače</title>

<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta content="" name="description">
<meta content="" name="keywords">
<meta content="" name="author">

<link rel="shortcut icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/pages/css/animate.css" rel="stylesheet">
<link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="assets/pages/css/components.css" rel="stylesheet">
<link href="assets/pages/css/slider.css" rel="stylesheet">
<link href="assets/onepage/css/style.css" rel="stylesheet">
<link href="assets/onepage/css/style-responsive.css" rel="stylesheet">
<link href="assets/onepage/css/themes/red.css" rel="stylesheet" id="style-color">
<link href="assets/onepage/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
</head>
<body class="menu-always-on-top">


  <?php include 'meni.php'; ?>

    <div class="about-block content content-center" id="about">
        <div class="container">
            <h2><strong><b>Unos instruktora</b></strong></h2>
            <form method="post" action="">
              <label for="imePrezime">Ime i prezime</label>
                <input type="text" name="imePrezime" id="imePrezime" class="form-control">
				<br>
              <label for="username">Korisničko ime</label>
                <input type="text" name="username" id="username" class="form-control">
				<br>
                <label for="password">Šifra</label>
                  <input type="password" name="password" id="password" class="form-control">
				  <br>
                  
                <label for="submit"></label>
                <input type="submit" value="Sacuvaj sluzbenika" name="sacuvaj" class="btn btn-primary margin-top-10">
              </form>
            <div id="rezultat"><?php echo $rezultat; ?></div>

            
        </div>
    </div>




    <?php include 'footer.php'; ?>

<script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="assets/plugins/jquery.easing.js"></script>
<script src="assets/plugins/jquery.parallax.js"></script>
<script src="assets/plugins/jquery.scrollTo.min.js"></script>
<script src="assets/onepage/scripts/jquery.nav.js"></script>
<script src="assets/onepage/scripts/layout.js" type="text/javascript"></script>
<script src="assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</body>
</html>