<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Creacio"]){
	
	$id = mysqli_real_escape_string($mysqli,$_GET["id"]);

	$Orden = 0;

	$SQL = "SELECT Orden from LinMD WHERE IdCapMenu = " . $id . " ORDER By Orden Desc LIMIT 1" ;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$Orden = $row["Orden"] + 1;
	}



	$SQL = "INSERT INTO LinMD( Titol, Descripcio,  IdCapMenu,Orden) VALUES ('Nueva P&aacute;gina', 'Descripció', ".$id.",$Orden)  ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $id;
}
?>