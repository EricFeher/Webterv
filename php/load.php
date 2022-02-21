<?php

	Class Felhasznalo{
		var $felhasznalonev;
		var $jelszo;
		var $dateof;
		var $sex;
		var $email;
		var $regdate;
		
		public function __construct($felhasznalonev,$jelszo,$dateof,$sex,$email,$regdate){
			$this->felhasznalonev=$felhasznalonev;
			$this->jelszo=$jelszo;
			$this->dateof=$dateof;
			$this->sex=$sex;
			$this->email=$email;
			$this->regdate=$regdate;
		}
		
		public function getFelhasznalonev() {
			return $this->felhasznalonev;
		}
		
		public function getJelszo(){
			return $this->jelszo;
		}
		
		public function getDateof(){
			return $this->dateof;
		}
		
		public function getSex(){
			return $this->sex;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getRegdate(){
			return $this->regdate;
		}
	}

  function loadUsers($path) {
	  
    $users = [];
    $file = fopen($path, "r");
	
    if ($file === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");

    while (($line = fgets($file)) !== FALSE) {
		
      $user = unserialize($line);
      $users[] = $user;
    }
	
    fclose($file);
    return $users;
	
  }

  function saveUsers($path, $users) {
	  
    $file = fopen($path, "w");
	
    if ($file === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");

    foreach($users as $user) {
		
      $serialized_user = serialize($user);
      fwrite($file, $serialized_user . "\n");
    }

    fclose($file);
  }
?>