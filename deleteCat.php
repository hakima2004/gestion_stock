<?php

require_once("categorie.php");
require_once("DAO.php");
$id=$_GET['id'];
DAO::supprimerCat($id);
header("location:categories.php");
?>