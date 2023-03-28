<?php
require_once("DAO.php");
extract($_POST);
require_once("appro.php");
$p = new appro($id,$date,$id_f,$ref,$Qte);
$p->save();
DAO::modifierqst2($ref,$Qte);
header("location:appros.php");
?>