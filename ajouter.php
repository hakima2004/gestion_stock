<?php
extract($_POST);



require_once("client.php");
$c = new client($id,$nom,$adr,$tele,$email);
$c->save();

header("location:clients.php");
//header("location: index1.php");
?>