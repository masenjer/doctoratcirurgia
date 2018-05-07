<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include("Fechas.php");
session_start();

$id = mysqli_real_escape_string($mysqli,$_GET["Id"]);
if ($id != "")
{
	$SQL = "SELECT * FROM Noticias WHERE IDSite = ".$_SESSION["IdSite"]." AND IdNoticia = ".$id;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	 while ($row = $result->fetch_assoc())
	{
		$T = $row["Titol"];
		$C = $row["Cos"];
		$F = SelectFecha($row["FechaNot"]);
		$FP = SelectFecha($row["FechaPub"]);
		$FD = SelectFecha($row["FechaDesPub"]);
		$IMG = $row["Image"];
		$NOU = $row["NOU"];
	}
}

 

echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id."|".$IMG."|".$NOU;

?>