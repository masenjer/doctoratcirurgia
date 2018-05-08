<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

$id = mysqli_real_escape_string($mysqli,$_GET["id"]); 

switch(mysqli_real_escape_string($mysqli,$_GET["op"]))
{
	case "1": 	$SQL = "SELECT Titol,Contingut FROM LinMD WHERE  IdLinMD = " . $id;
				break;
	case "2": 	$SQL = "SELECT Titol,Contingut FROM LinMD WHERE  IdLinMD = " . $IdLinMD;
				break;

}
/////Primero compruebo que no se trate de un nodo padre

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	 while ($row = $result->fetch_assoc())
	{
		$Titol = $row["Titol"];
		$Titol = Quita($Titol);
		
		$Contingut = $row["Contingut"];
		//$Contingut = Quita($Contingut);
	}


	$Ruta = $Titol;

echo $Titol ."|". $Contingut."|".$Ruta."|".$IdLinMD;
?>

