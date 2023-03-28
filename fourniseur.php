<?php
require_once("DAO.php");
class fourniseur{
	private $id_f;
	private $nom;
	private $adr;
	private $tele;
	private $email;
	function __construct($i,$n,$a,$t,$e){
		$this->id_f=$i;
		$this->nom=$n;
		$this->adr=$a;
		$this->tele=$t;
		$this->email=$e;
	}
	function save(){
		DAO::enregistrerfourniseur($this->id_f,$this->nom,$this->adr,$this->tele,$this->email);		
	}
	function __getfourniseur($prop){
		switch($prop){
			case 'id_f' : return $this->id_f;
			case 'nom' : return $this->nom;
			case 'adr' : return $this->adr;
			case 'tele' : return $this->tele;
			case 'email' : return $this->email;
		}
	}
     function __setfourniseur($prop,$value){
		switch($prop){
			case 'id' : $this->id_f($value);
			case 'nom' : $this->nom($value);
			case 'adr' : $this->adr($value);
			case 'tele' : $this->tele($value);
			case 'email' : $this->email($value);
		}
	
}
}


?>