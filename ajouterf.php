<?php
extract($_POST);
require_once("fourniseur.php");
$c = new fourniseur($id_f,$nom,$adr,$tele,$email);
$c->save();

header("location:fourniseurs.php");
?>