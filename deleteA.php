<?php

require_once("appro.php");
require_once("DAO.php");
$id=$_GET['num'];
DAO::supprimerAppro($id);
header("location:appros.php");
?>