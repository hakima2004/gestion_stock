<?php
require_once("DAO.php");
 extract($_POST);
 require_once("cmd.php");
 $p = new cmd($numeroCmd,$date,$id_client,$ref,$qte);
 $p->save();
      DAO::modifierqst($ref,$qte); 
header("location:categories.php");
?>