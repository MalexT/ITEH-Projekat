<?php
include 'glavnaSesija.php';
include 'konekcija.php';

$upit = "SELECT pred.nazivPredmeta , count(p.predmetID) as brojPrijava FROM prijava p join predmet pred on p.predmetID = pred.predmetID group by pred.predmetID";

$niz = [];
$pomoc = Array("Naziv predmeta","Broj prijava");
array_push($niz,$pomoc);
$rez = $konekcija->query($upit);
while($red = $rez->fetch_assoc()){
  $pomoc2 = Array($red['nazivPredmeta'],intval($red['brojPrijava']));
  array_push($niz,$pomoc2 );
}

echo json_encode($niz);
 ?>
