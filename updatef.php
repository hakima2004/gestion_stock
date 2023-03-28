<?php
extract($_POST);
require_once("DAO.php");

DAO::modifierfourniseur($id_f,$nom,$adr,$tele,$email);

header("location:fourniseurs.php");
?>