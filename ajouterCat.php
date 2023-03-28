<?php
extract($_POST);
require_once("categorie.php");
require_once("DAO.php");
$s = new categorie($id,$desc);
$s->save();
header("location:categories.php");
?>