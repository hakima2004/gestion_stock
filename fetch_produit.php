<?php 
require_once("DAO.php");
$pdo=DAO::getPDO();
$id=$_POST['id'];
$req=$pdo->prepare("SELECT * FROM `produit` WHERE `reference`=$id");
$req->execute(array());
while ($row=$req->fetchAll()) {
	$data=$row;echo json_encode($data);
}

 ?>