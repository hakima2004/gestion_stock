<?php
require_once("DAO.php");
class produit{
	private $ref;
	private $lib;
	private $pu;
	private $Qstock;
	private $prixA;
	private $prixV;
	private $cat;
	function __construct($r,$l,$p,$qte,$pa,$pv,$c){
		$this->ref=$r;
		$this->lib=$l;
		$this->pu=$p;
		$this->Qstock=$qte;
		$this->prixA=$pa;
		$this->prixV=$pv;
        $this->cat=$c;
	}
	function save(){
		DAO::enregistrerProduit($this->ref,$this->lib,$this->pu,$this->Qstock,$this->prixA,$this->prixV,$this->cat);
			
	}
		function __getproduit($prop){
		switch($prop){
		
			case 'ref'   : return $this->ref;
			case 'lib'   : return $this->lib;
			case 'pu'    : return $this->pu;
			case 'Qstock': return $this->Qstock;
			case 'prixA' : return $this->prixA;
			case 'prixV' : return $this->prixV;
            case 'cat'   : return $this->cat;
		}
	}
   function __setproduit($prop,$value){
		switch($prop){
		
			case 'ref' : $this->ref($value);break;
			case 'lib' : $this->lib($value);break;
			case 'pu' : $this->pu($value);break;
			case 'Qstock' : $this->Qstock($value);break;
			case 'prixA': $this->prixA($value);break;
			case 'prixV':$this->prixV($value);break;
			case 'cat':$this->cat($value);break;
		}
	
}
}


?>