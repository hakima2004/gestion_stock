<?php
require_once("DAO.php");
class appro{
	private $id;
	private $date;
	private $id_f;
	private $ref;
	private $Qte;
	
	function __construct($n,$d,$i,$r,$qte){
		
		$this->id=$n;
		$this->date=$d;
		$this->id_f=$i;
		$this->ref=$r;
		$this->Qte=$qte;
		
		
	}
	function save(){
		DAO::enregistrerappro($this->id,$this->date,$this->id_f,$this->ref,$this->Qte);
			
	}
		function __getappro($prop){
		switch($prop){

			case 'id'   : return $this->id;
			case 'date'    : return $this->date;
			case 'id_f': return $this->id_f;
			case 'ref'   : return $this->ref;
			case 'Qte' : return $this->Qte;
			
		}
	}
   function __setappro($prop,$value){
		switch($prop){
		
			case 'id' : $this->id($value);break;
			case 'date' : $this->date($value);break;
			case 'id_f' : $this->id_f($value);break;
			case 'ref' : $this->ref($value);break;
			case 'Qte': $this->Qte($value);break;
			
		}
	
}
}


?>