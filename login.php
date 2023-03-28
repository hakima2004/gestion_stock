<?php 
require_once("Administrateur.php");
	extract($_POST);
	$a=new Administrateur("",$login,$password,'');
	if($a->estUnAdmin()){
		session_start();
		$_SESSION['login']=$login;
		header("location:index1.php");
	}else{
		header("location:loginn.php");

	}


?>