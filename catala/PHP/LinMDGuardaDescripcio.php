<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

session_start();

if ($_SESSION["Edicio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$titol = mysqli_real_escape_string($mysqli,$_GET["titol"]);
	$titol2 = Pon($titol);

	$SQL = "UPDATE LinMD SET Descripcio = '".$titol2."' WHERE IdLinMD =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $id."|".Quita($titol);

}
?>