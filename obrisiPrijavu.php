<?php
include 'glavnaSesija.php';
include 'konekcija.php';

$brojKandidata = $konekcija->real_escape_string($_GET['brojKandidata']);
$predmetID= $konekcija->real_escape_string($_GET['predmetID']);
$rokID = $konekcija->real_escape_string($_GET['rokID']);
$konekcija->query("DELETE FROM prijava where brojKandidata = '$brojKandidata' AND predmetID=$predmetID and rokID= $rokID");
header("Location:adminStrane.php");


 ?>
