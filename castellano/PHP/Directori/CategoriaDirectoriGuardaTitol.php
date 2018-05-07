<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

if ($_SESSION["Edicio"]){


	switch ($_SESSION["IdSite"]){
		case 0: $idioma = "_ca";
				break;
		case 1: $idioma = "_es";
				break;
		case 2: $idioma = "_en";
				break;					
	}

	echo $_SESSION["IdSite"];

	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$titol = mysqli_real_escape_string($mysqli,$_GET["titol"]);
	$titol2 = Pon($titol);

	$SQL = "UPDATE DirectoriCategoria SET Titol".$idioma." = '".$titol2."' WHERE IdDirectoriCategoria =" . $id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));



	echo $id."|".Quita($titol);
}
?> 