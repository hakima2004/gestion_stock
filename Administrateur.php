<?php  
require_once("DAO.php");
class Administrateur{
	private $nom;
	private $login;
	private $password;
	private $photo;
	function __get($prop){
		switch ($prop) {
			case 'nom': return $this->nom;  break;
			case 'login': return $this->login;  break;
			case 'password': return $this->password;  break;
            case 'photo': return $this->photo;  break;

		}
	}
	function __construct($n,$l,$p,$ph){
			$this->nom=$n;
			$this->login=$l;
			$this->password=$p;
			$this->photo=$ph;
	}
	function estUnAdmin(){
		$dao=new DAO();
		return $dao->authentification($this->login,$this->password);
	}
	function save(){
		DAO::enregistrerUser($this->login,$this->password,$this->photo);
	}

}
?>