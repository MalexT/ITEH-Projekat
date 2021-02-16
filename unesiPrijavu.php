<?php
  include 'glavnaSesija.php';
  include 'konekcija.php';
  $rezultat = "";

  if(isset($_POST['sacuvaj'])){
    $predmet = $_POST['predmet'];
    $kandidat = $_POST['kandidat'];
    $rok = $_POST['rok'];
    $instruktor = $_SESSION['instruktor']->instruktorID;

    if($konekcija->query("INSERT INTO prijava(rokID,predmetID,brojKandidata,instruktorID) VALUES ($rok,$predmet,'$kandidat',$instruktor)")){
      
      $rezultat = "Uspešno prijavljen";
    }else{
      $rezultat = "Neuspešno prijavljen";
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

<link rel="shortcut icon" href="assets/onepage/img/favicon.ico">
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
</head>
<body class="menu-always-on-top">


  <?php include 'meni.php'; ?>

    <div class="about-block content content-center" id="about">
        <div class="container">
            <h2><strong><b>Unos prijave<b></strong></h2>
            <form method="post" action="">
              <label id="rok">Rok</label>
                <select name="rok" id="rok" class="form-control" name="rok">
				
                  <?php
                  $zahtev = curl_init("http://localhost/fonsluzba/vozacVebServis/rokovi");
            			curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, true);
            			$json = curl_exec($zahtev);
            			$podaci = json_decode($json);
            			curl_close($zahtev);

                      foreach($podaci as $row){
                        ?>
                        <option value="<?php echo $row->rokID ?>"><?php echo $row->nazivRoka ?> </option>
                        <?php
                      }
                   ?>
                </select><br>
                <label id="kandidat">Kandidat</label>
                  <select name="kandidat" id="kandidat" class="form-control" name="kandidat">
				  
                    <?php
                    $zahtev = curl_init("http://localhost/fonsluzba/vozacVebServis/kandidati");
                    curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, true);
                    $json = curl_exec($zahtev);
                    $podaci = json_decode($json);
                    curl_close($zahtev);
                        foreach($podaci as $row){
                          ?>
                          <option value="<?php echo $row->brojKandidata ?>"><?php echo $row->imePrezimeKandidata ?> </option>
                          <?php
                        }
                     ?>
                  </select><br>
                  <label id="predmet">Predmet polaganja</label>
                    <select name="predmet" id="predmet" class="form-control" name="predmet">
					
                      <?php
                      $zahtev = curl_init("http://localhost/fonsluzba/vozacVebServis/predmeti");
                      curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, true);
                      $json = curl_exec($zahtev);
                      $podaci = json_decode($json);
                      curl_close($zahtev);
                          foreach($podaci as $row){
                            ?>
                            <option value="<?php echo $row->predmetID ?>"><?php echo $row->nazivPredmeta ?> </option>
                            <?php
                          }
                       ?>
                    </select><br>
                    <label for="submit"></label>
                    <input type="submit" value="Sačuvaj" name="sacuvaj" class="btn btn-primary margin-top-10">
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
<script>
    jQuery(document).ready(function() {
        Layout.init();
    });
</script>

</body>
</html>
