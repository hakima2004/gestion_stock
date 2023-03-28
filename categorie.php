<?php 
require_once("DAO.php");

/**
 * 
 */
class categorie
{
	private $id_cat;
	private $desc;
	function __construct($id,$d)
	{
		$this->id_cat=$id;
		$this->desc=$d;
	}
	function save(){
		DAO::enregistrerCat($this->id_cat,$this->desc);
	}
	function __getcat($prop)
	{
		switch ($prop) {
			case 'id_cat':
				return $this->id_cat;
				
			
			case 'desc':
				return $this->desc;
			
		}
	}
	function __setcat($prop,$v)
	{
		switch ($prop) {
			case 'id_cat':
				 $this->id_cat($v);
				break;
			
			case 'desc':
				 $this->desc($v);
				break;
		}
	}
}

 ?>