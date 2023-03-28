
<?php
extract($_POST);
require_once("Administrateur.php");

$photo=$_FILES['photo'];
	//echo $photo['name']."<br>".$photo['tmp_name'];
	$filename=$photo['tmp_name'];
	$extension= pathinfo($photo['name'], PATHINFO_EXTENSION);
	$destination="../fonts/photos/$email.$extension";
	move_uploaded_file($filename,$destination);


$a = new Administrateur('',$email,$password,$destination);
$a->save();

header("location:users.php");
?>