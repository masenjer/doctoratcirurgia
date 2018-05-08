<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

if ($_SESSION["Edicio"]){

	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$FB = mysqli_real_escape_string($mysqli,$_GET["FB"]);
	$TE = mysqli_real_escape_string($mysqli,$_GET["TE"]);
	$IMG = mysqli_real_escape_string($mysqli,$_GET["IMG"]);
	$IMG = Pon($IMG);
	$URL = mysqli_real_escape_string($mysqli,$_GET["URL"]);
	$OldDoc = mysqli_real_escape_string($mysqli,$_GET["OldDoc"]);

	if ($OldDoc != "")
	{
		unlink("../Documents/".$OldDoc)	;
	}

	if ($id == "")
	{	 
		$SQL = "INSERT INTO Destacat(FormatBoto,TipusEnllac, Imatge, URL, Orden, IdSite ) VALUES ($FB,$TE,'$IMG','$URL',0, ".$_SESSION["IdSite"]." )";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		$SQL = "SELECT IdDestacat FROM Destacat ORDER BY IdDestacat DESC LIMIT 1";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		while ($row = $result->fetch_assoc())
		{
			$id = $row["IdDestacat"]; 	
		}

	}
	else
	{
		$SQL = "UPDATE Destacat SET 
					FormatBoto = $FB,
					TipusEnllac = $TE, 
					Imatge = '$IMG', 
					URL = '$URL',
					IdSite = ".$_SESSION["IdSite"]."			
					WHERE IdDestacat = $id";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	}

	echo $id;
}

?>