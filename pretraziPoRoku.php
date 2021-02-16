<?php
include 'glavnaSesija.php';
include 'konekcija.php';

$id = $_GET['id'];
$id = $konekcija->real_escape_string($id);
if($id == "0"){
  $q = "SELECT * FROM prijava p join predmet pre on p.predmetID = pre.predmetID join kandidat k on p.brojKandidata=k.brojKandidata join rok r on p.rokID=r.rokID join instruktor ins on p.instruktorID = ins.instruktorID";
}else{
  $q = "SELECT * FROM prijava p join predmet pre on p.predmetID = pre.predmetID join kandidat k on p.brojKandidata=k.brojKandidata join rok r on p.rokID=r.rokID join instruktor ins on p.instruktorID = ins.instruktorID where r.rokID=$id";
}


 ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th>Broj kandidata</th>
      <th>Kandidat</th>
      <th>Predmet polaganja</th>
      <th>Rok</th>
      <th>Poeni</th>
      <th>Datum prijave</th>
      <th>Instruktor</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $rez = $konekcija->query($q);
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
          </tr>

          <?php
        }
     ?>
  </tbody>
</table>
