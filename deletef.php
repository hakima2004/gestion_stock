<?php

require_once("fourniseur.php");
require_once("DAO.php");
$id=$_GET['id_f'];
DAO::supprimerfourniseur($id);
header("location:fourniseurs.php");
?>