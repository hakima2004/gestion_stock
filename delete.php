<?php

require_once("client.php");
require_once("DAO.php");
$id_client=$_GET['id'];
DAO::supprimerClient($id_client);
header("location:clients.php");
?>