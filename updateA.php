<?php
extract($_POST);
require_once("DAO.php");

DAO::modifierappro($num,$date,$id_f,$ref,$qte);


header("location:appros.php");
?>