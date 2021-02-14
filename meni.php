<div class="header header-mobi-ext">
    <div class="container">
        <div class="row">
        <a class="scroll site-logo" href="index.php"><img src="assets/onepage/img/logo.png" alt="L"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <div class="col-md-10 pull-left">
                <ul class="header-navigation">
                    <li><a href="index.php">Pretraga prijava</a></li>
                    <li><a href="unesiPrijavu.php">Nova prijava</a></li>
                    <li><a href="pretragaPoKandidatu.php">Pretraga po kandidatima</a></li>
                    <li><a href="unesiPredmet.php">Novi predmet</a></li>
                    <li><a href="fajlovi.php">Dokumenti</a></li>
					<?php if($_SESSION['instruktor']->proveriInstruktora()){
                      ?>
                      <li><a href="scrnsvr.php">Screen</a></li>
					  
                      <?php
                    } ?>
                    <?php if($_SESSION['instruktor']->proveriAdministratora()){
                      ?>
                      <li><a href="adminStrane.php">Admin</a></li>
					  <li><a href="noviInstruktor.php">Novi instruktor</a></li>
                      <?php
                    } ?>
                    
                    <li><a href="logout.php">Izloguj se</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>