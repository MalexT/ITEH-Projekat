<?php

class Instruktor{
  public $instruktorID;
  public $imePrezime;
  public $username;
  public $password;
  public $uloga;


  function __construct($instruktorID,$imePrezime,$username,$password,$uloga) {
			$this->instruktorID = $instruktorID;
      $this->imePrezime = $imePrezime;
      $this->username = $username;
      $this->password = $password;
      $this->uloga = $uloga;
		}

    public static function ulogujMe($konekcija,$username,$password){
      $q = "SELECT * FROM instruktor i join uloga u on i.uloga = u.ulogaID where i.username='$username' AND i.password='$password' LIMIT 1";
      $r = $konekcija->query($q);

        while($row = $r->fetch_assoc()){
          $uloga = new Uloga($row['ulogaID'],$row['nazivUloge']);
          $instruktorID = new Instruktor($row['instruktorID'],$row['imePrezime'],$row['username'],$row['password'],$uloga);
          $_SESSION['instruktor'] = $instruktorID;
          return true;
        }

      return false;
    }


	function proveriInstruktora(){

      if($this->uloga != ""){
        if($this->uloga->ulogaID == "1"){
          return true;
        }
      }

      return false;
    }
    function proveriAdministratora(){

      if($this->uloga != ""){
        if($this->uloga->nazivUloge == "Administrator"){
          return true;
        }
      }

      return false;
    }
}

 ?>
