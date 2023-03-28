<?php
extract($_POST);
require_once("produit.php");
$p = new produit($ref,$lib,$pu,$Qstock,$prixA,$prixV,$id_cat);
$p->save();
header("location:produits.php");
?>