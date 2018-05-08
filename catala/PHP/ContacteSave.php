<?php

try{


include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

if ($_SESSION["Edicio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$Titol = mysqli_real_escape_string($mysqli,$_GET["Titol"]);
	$Titol = Pon($Titol);
	$TE = mysqli_real_escape_string($mysqli,$_GET["TE"]);
	$URL = mysqli_real_escape_string($mysqli,$_GET["URL"]);

	$SQL = "SELECT COUNT(*) as Cuenta from Contacte WHERE  IdSite =".$_SESSION["IdSite"]." ";

	$Cuenta = "";

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	while ($row = $result->fetch_assoc()){	
		$Cuenta = $row["Cuenta"];	
	}


	if ($Cuenta!="0")
		$SQL = "UPDATE Contacte SET 
					Titol = '$Titol',
					Contingut = '$TE', 
					URL = '$URL'
				WHERE IdSite = ".$_SESSION["IdSite"];
	else $SQL = "INSERT INTO Contacte (Titol, Contingut, URL, IdSite) VALUES ('$Titol','$TE','$URL', ".$_SESSION["IdSite"].")";							

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	}
	catch(Exception $e){
		echo $e;
	}

	echo "1";

}

?>