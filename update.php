<?php
extract($_POST);
require_once("DAO.php");

DAO::modifierClient($id,$nom,$adr,$tele,$email);


header("location:Clients.php");
?>