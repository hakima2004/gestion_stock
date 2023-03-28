<?php
extract($_POST);
require_once("DAO.php");
DAO::modifierCtg($id,$des);
header("location:categories.php");
?>