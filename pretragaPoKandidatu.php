<?php
  include 'glavnaSesija.php';
  include 'konekcija.php';
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
</head>
<body class="menu-always-on-top">


  <?php include 'meni.php'; ?>

    <div class="about-block content content-center" id="about">
        <div class="container">
            <h2><strong><b>Pretraga po kandidatima</b></strong></h2>
            <h4>Lista kandidata</h4>
            <select name="rok" id="rok" class="form-control" onchange="pretraziPoKandidatu(this.value)">
              <option value="0">Svi kandidati </option>
              <?php
                  $q ="SELECT * FROM kandidat";
                  $rez = $konekcija->query($q);
                  while($row = $rez->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['brojKandidata'] ?>"><?php echo $row['imePrezimeKandidata'] ?> </option>
                    <?php
                  }
               ?>
            </select>
            <div id="rezultat"></div>

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
<script>
    function pretraziPoKandidatu(id){
      $.ajax({
        url: "pretraziPoKandidatu.php",
        data: {id:id},
        success: function(tabela){
          $("#rezultat").html(tabela);
        }
      })
    }
</script>
<script>
pretraziPoKandidatu(0);
</script>
</body>
</html>
