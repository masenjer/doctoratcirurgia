<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

if ($_SESSION["Edicio"]){


	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
	$fecha = Pon(mysqli_real_escape_string($mysqli,$_GET["fecha"]));
	$hora = mysqli_real_escape_string($mysqli,$_GET["hora"]);
	$ubicacio = mysqli_real_escape_string($mysqli,$_GET["ubicacio"]);
	$descripcio = mysqli_real_escape_string($mysqli,$_GET["descripcio"]);
	$enllac = mysqli_real_escape_string($mysqli,$_GET["enllac"]);
	
	

	if ($id == "")
	{	
	  $SQL = "INSERT INTO Agenda (Fecha, Hora, Ubicacio ,Descripcio, Enllac, IdSite ) VALUES ('$fecha','$hora','$ubicacio','$descripcio','$enllac',".$_SESSION["IdSite"].")";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		$SQL = "SELECT IdAgenda FROM Agenda ORDER BY IdAgenda DESC LIMIT 1";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		while ($row = $result->fetch_assoc())
		{
			$id = $row["IdAgenda"]; 	
		}

	}
	else
	{
		$SQL = "UPDATE Agenda SET 
					Fecha = '$fecha',
					Hora = '$hora', 
					Ubicacio = '$ubicacio',
					Descripcio = '$descripcio',
					Enllac = '$enllac',
					IdSite = ".$_SESSION["IdSite"]."				
					WHERE IdAgenda = $id";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	}

	echo $id;

}
?>