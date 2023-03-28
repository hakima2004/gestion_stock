<?php
require_once("DAO.php");
class client{
	private $id;
	private $nom;
	private $adr;
	private $tele;
	private $email;
	function __construct($i,$n,$a,$t,$e){
		$this->id=$i;
		$this->nom=$n;
		$this->adr=$a;
		$this->tele=$t;
		$this->email=$e;
	}
	function save(){
		DAO::enregistrerClient($this->id,$this->nom,$this->adr,$this->tele,$this->email);
			
	}
	function __getclient($prop){
		switch($prop){
			case 'id' : return $this->id;
			case 'nom' : return $this->nom;
			case 'adr' : return $this->adr;
			case 'tele' : return $this->tele;
			case 'email' : return $this->email;
		}
	}
    static function __setclient($prop,$value){
		switch($prop){
			case 'id' : $this->id($value);
			case 'nom' : $this->nom($value);
			case 'adr' : $this->adr($value);
			case 'tele' : $this->tele($value);
			case 'email' : $this->email($value);
		}
	
}
}


?>