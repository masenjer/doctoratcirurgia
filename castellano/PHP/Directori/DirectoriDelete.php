<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php");

session_start();

if ($_SESSION["Creacio"]){


	$id = Pon(mysqli_real_escape_string($mysqli,$_POST["id"]));

	$SQL = "SELECT Imatge FROM Directori WHERE IdDirectori = ".$id;	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		if(file_exists("../../../imgDirectori/".$row["Imatge"])) unlink("../../../imgDirectori/".$row["Imatge"]);
	}


	$SQL = "DELETE FROM Directori WHERE IdDirectori = ".$id;

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


}
?>