<?php
require_once("DAO.php");
class cmd{
	private $numeroCmd;
	private $date;
	private $id_client;
	private $reference;
	private $qte;
	
	function __construct($numeroCmd,$date,$id_client,$ref,$q){
		$this->numeroCmd=$numeroCmd;
		$this->date=$date;
		$this->id_client=$id_client;
        $this->reference=$ref;
        $this->qte=$q;
	}
	function save(){
		DAO::enregistrerCmd($this->numeroCmd,$this->date,$this->id_client,$this->reference,$this->qte);
			
	}
	function __getCmd($prop){
		switch($prop){
			case 'numeroCmd' : return $this->numeroCmd;
			case 'date' : return $this->date;
			case 'id_client' : return $this->id_client;
			case 'reference' : return $this->reference;
			case 'qte' : return $this->qte;
		}
	}
	function __setCmd($prop,$value){
		switch($prop){
			case 'numeroCmd' : $this->numeroCmd($value);break;
			case 'date' :      $this->date($value);break;
			case 'id_client' : $this->id_client($value);break;
			case 'reference':
				$this->reference($value);
				break;
				case 'qte':
				$this->qte($value);
				break;
		}
	}
}


?>