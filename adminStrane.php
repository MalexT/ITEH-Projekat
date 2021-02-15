<?php
  include 'glavnaSesija.php';
  include 'konekcija.php';
  $rezultat = "";
  $rezultatIzmena = "";
  if(isset($_POST['sacuvaj'])){
    $student = $_POST['student'];
    $broj = $_POST['broj'];
    $telefon = $_POST['telefon'];
    $datum = $_POST['datum'];
	
	

    if($konekcija->query("INSERT INTO kandidat(brojKandidata,imePrezimeKandidata,brojTelefona,datumRodjenja) VALUES ('$broj','$student','$telefon','$datum')")){
      $rezultat = "Uspešno unet kandidat";
    }else{
      $rezultat = "Neuspešno unet kandidat";
    }
  }

  if(isset($_POST['izmeni'])){
    $prijava = $_POST['prijava'];
    $ocena = $_POST['ocena'];
    $nizIDa = explode("_",$prijava);
    $brIndeksa = $nizIDa[0];
    $prID = $nizIDa[1];
    $rID = $nizIDa[2];

    if($konekcija->query("UPDATE prijava set brojPoena =  $ocena where brojIndeksa = '$brIndeksa' and predmetID=$prID and rokID=$rID")){
      $rezultatIzmena = "Uspešno promenjen broj poena";
    }else{
      $rezultatIzmena = "Neuspešno promenjen broj poena";
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
            <h2><strong><b>Unos kandidata</b></strong></h2>
            <form method="post" action="">
              <label for="broj">Broj kandidata</label>
                <input type="text" name="broj" id="broj" class="form-control">
				<br>
              <label for="student">Kandidat</label>
                <input type="text" name="student" id="student" class="form-control">
				<br>
                <label for="telefon">Telefon</label>
                  <input type="text" name="telefon" id="telefon" class="form-control">
				  <br>
                  <label for="datum">Datum rođenja</label>
                    <input type="text" name="datum" id="datum" class="form-control datepicker">
					<br>
                <label for="submit"></label>
                <input type="submit" value="Sačuvaj studenta" name="sacuvaj" class="btn btn-primary margin-top-10">
				<br>
              </form>
            <div id="rezultat"><?php echo $rezultat; ?></div>
            <h2 class="margin-top-10"><strong><b>Izmena poena</b></strong></h2>
            <form method="post" action="">
              <label for="prijava">Prijava</label>
              <select name="prijava" id="prijava" class="form-control" name="prijava">
                <?php
                    $q ="SELECT * FROM prijava p join predmet pre on p.predmetID = pre.predmetID join kandidat k on p.brojKandidata=k.brojKandidata join rok r on p.rokID=r.rokID join instruktor sl on p.instruktorID = sl.instruktorID";
                    $rez = $konekcija->query($q);
                    while($row = $rez->fetch_assoc()){
                      ?>
                      <option value="<?php echo $row['brojKandidata'] ?>_<?php echo $row['predmetID'] ?>_<?php echo $row['rokID'] ?>"><?php echo $row['imePrezimeKandidata'] ?> - <?php echo $row['nazivPredmeta'] ?> - <?php echo $row['nazivRoka'] ?> - <?php echo $row['brojPoena'] ?> </option>
                      <?php
                    }
                 ?>
              </select>
			  <br>
                <label for="ocena">Poeni</label>
                  <input type="text" name="ocena" id="ocena" class="form-control">

                <label for="submit"></label>
                <input type="submit" value="Izmeni ocenu" name="izmeni" class="btn btn-primary margin-top-10">
              </form>
			  <br><br>
            <div id="rezultat"><?php echo $rezultatIzmena; ?></div>
            <h1><strong><b>Pregled prijava</b></strong></h1>
            <table id="prijave" class="table table-hover">
              <thead>
                <tr>
                  <th>Broj kandidata</th>
                  <th>Kandidat</th>
                  <th>Predmet polaganja</th>
                  <th>Rok polaganja</th>
                  <th>Poeni</th>
                  <th>Datum prijave</th>
                  <th>Instruktor</th>
                  <th>Brisanje</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $rez = $konekcija->query("SELECT * FROM prijava p join predmet pre on p.predmetID = pre.predmetID join kandidat k on p.brojKandidata=k.brojKandidata join rok r on p.rokID=r.rokID join instruktor iss on p.instruktorID = iss.instruktorID");
                    while($row = $rez->fetch_assoc()){
                      ?>
                      <tr>
                        <td><?php echo $row['brojKandidata'] ?></td>
                        <td><?php echo $row['imePrezimeKandidata'] ?></td>
                        <td><?php echo $row['nazivPredmeta'] ?></td>
                        <td><?php echo $row['nazivRoka'] ?></td>
                        <td><?php echo $row['brojPoena'] ?></td>
                        <td><?php echo $row['datumPrijave'] ?></td>
                        <td><?php echo $row['imePrezime'] ?></td>
                        <td><a href="obrisiPrijavu.php?brojKandidata=<?php echo $row['brojKandidata'] ?>&predmetID=<?php echo $row['predmetID'] ?>&rokID=<?php echo $row['rokID'] ?>" class="btn btn-danger"><i class="fa fa-times"></i> Obrisi</a></td>
                      </tr>

                      <?php
                    }
                 ?>
              </tbody>
            </table>
            <h1><strong><b>Ubaci raspored</b></strong></h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
               <br>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                <input type="submit" class="form-control btn-primary margin-top-10" value="Ubaci raspored" name="submit">
            </form><br><br>
            <h1><strong><b>Vizuelni podaci</b></strong></h1>
            <div id="piechart" style="width: 900px; height: 500px;"></div>
            
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
<script>
    jQuery(document).ready(function() {
        Layout.init();
    });
</script>
<script>
  $( function() {
    $( "#datum" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  <script>

    $(document).ready(function(){
        $('#prijave').DataTable();
    });
  </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var podaci;
        $.ajax({
          url: "vratiGrafickePodatke.php",
          success: function(json){
            podaci = JSON.parse(json);
            var data = google.visualization.arrayToDataTable(podaci);

            var options = {
              title: 'Broj prijava po predmetu',
              is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        })


      }
    </script>
    
</body>
</html>
