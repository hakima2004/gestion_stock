<?php

require_once("produit.php");
require_once("DAO.php");
$ref=$_GET['ref'];
DAO::supprimerProduit($ref);
header("location:produits.php");
?>