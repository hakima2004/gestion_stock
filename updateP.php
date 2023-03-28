<?php
extract($_POST);
require_once("DAO.php");

DAO::modifierProduit($ref,$lib,$pu,$Qstock,$prixA,$prixV,$id_cat);


header("location:produits.php");
?>