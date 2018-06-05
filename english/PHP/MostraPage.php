<?php
error_reporting (5); 
session_start();

include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 

$id = mysqli_real_escape_string($mysqli,$_GET["id"]); 

switch($_GET["op"])
{
	case 1: 	$SQL = "SELECT Titol,Contingut, Tipus, IdCapMenu, IdSite FROM LinMenu WHERE IdLinMenu = " . $id;
				break;
	case 2: 	$SQL = "SELECT Titol,Contingut, IdCapMenu FROM LinMD WHERE  IdLinMD = " . $id;
				break;

}


/////Primero compruebo que no se trate de un nodo padre

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	
	 while ($row = $result->fetch_assoc())
	{
		$_SESSION["IdSite"] = $row["IdSite"];

		$Titol = $row["Titol"];
		$Titol = Quita($Titol);
		
		$Contingut = str_replace("/NewPage","",$row["Contingut"]);
		//$Contingut = Quita($Contingut);
		$IdCap = $row["IdCapMenu"];
		$Tipus = $row["Tipus"];		
	}




$SQL = "SELECT Titol FROM CapMenu WHERE IdCapMenu = ".$IdCap;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$TitolCap = $row["Titol"];
}


 


if ($_GET["op"] == "1")
{
	if ($Id != '84')
	{
		$Ruta = '

		<ul class="breadcrumb"> 
			<li>
				<a href="/">Inici</a>
			</li> 
			<li>
				<a href="#!/MS_'.$IdCap.'">'.$TitolCap.'</a>
			</li>
			'.BuscaRuta($id).
		'</ul>';
	}
	else
	{
		$Titol = "";	
	}
}

echo $Titol ."|". $Contingut."|".$Ruta."|".$id.",".$_GET["op"]."|".$IdCap."|".$Tipus;
?>

<?php
function BuscaRuta($IdLin)
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$SQL = "SELECT Titol,IdLinMenuRel, IdCapMenu FROM LinMenu WHERE IdLinMenu = ".$IdLin;
	if (!$result = $mysqli->query($SQL))printf("Errormdddessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		if ($row["IdLinMenuRel"] == 0)
		{
			return '
				<li>
					<a href="#!/'.$row["Titol"].'_'.$IdLin.'_1">'. $row["Titol"].'</a>
				</li>';
		}
		else
		{
			return BuscaRuta($row["IdLinMenuRel"]).'
				<li>
					<a href="#!/'.$row["Titol"].'_'.$IdLin.'_1">'. $row["Titol"].'</a>
				</li>';
		}
	}
	 
}
?>