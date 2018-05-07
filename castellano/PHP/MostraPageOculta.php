<?php
error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

$id = mysqli_real_escape_string($mysqli,$_GET["id"]); 

switch(mysqli_real_escape_string($mysqli,$_GET["op"]))
{
	case 1: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMenu WHERE IdLinMenu = " . $id;
				break;
	case 2: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMD WHERE  IdLinMD = " . $id;
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
		$IdCap = $row["IdCapMenu"];
	}




$SQL = "SELECT Titol FROM CapMenu WHERE IdCapMenu = ".$IdCap;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$TitolCap = $row["Titol"];
}

 


if (mysqli_real_escape_string($mysqli,$_GET["op"]) == "1")
{
	if ($Id != '84')
	{
		$Ruta = '<a href onclick="MostraHome();">Inici</a>> '.$TitolCap." > ".BuscaRuta($id);
	}
	else
	{
		$Titol = "";	
	}
}

echo $Titol ."|". $Contingut."|".$Ruta."|".$id.",".mysqli_real_escape_string($mysqli,$_GET["op"])."|".$IdCap;
?>

<?php
function BuscaRuta($IdLin)
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$SQL = "SELECT Titol,IdLinMenuRel, IdCapMenu FROM LinMenu WHERE IdLinMenu = ".$IdLin;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		if ($row["IdLinMenuRel"] == 0)
		{
			return '<b>'.$row["Titol"].'</b>';
		}
		else
		{
			return BuscaRuta($row["IdLinMenuRel"])." > ". $row["Titol"];
		}
	}
	 
}
?>