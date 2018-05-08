<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
session_start();
 
$sel1 = mysqli_real_escape_string($mysqli,$_GET["sel1"]);
$sel2 = mysqli_real_escape_string($mysqli,$_GET["sel2"]);
$id = mysqli_real_escape_string($mysqli,$_GET["id"]);

if ($id != "Ocultes") $SQL = "SELECT * FROM LinMenu WHERE IdSite = ".$_SESSION["IdSite"]." AND IdCapMenu = $id AND Tipus <> 2 order by Orden";
else $SQL = "SELECT * FROM LinMenu WHERE IdSite = ".$_SESSION["IdSite"]." AND Tipus = 2 order by Orden";

 
$resultado = "<option value=0>----------------------------------</option>";

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){
	
	
	if ($row["IdLinMenu"] == $sel1)
	{		
		$resultado = $resultado."<option value=".$row["IdLinMenu"]." selected >".$row["Titol"]."</option>";
	}else
	{
		$resultado = $resultado."<option value=".$row["IdLinMenu"] .">".$row["Titol"]."</option>";
	}
}


$resultado = $resultado."|<option value=0>----------------------------------</option>";

if ($id != "Ocultes")
{
	$SQL = "SELECT * FROM LinMD WHERE IdCapMenu = $id order by Orden";
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	while ($row = $result->fetch_assoc()){		
		
		if ($row["IdLinMD"] == $sel2)
		{		
			$resultado = $resultado."<option value=".$row["IdLinMD"]." selected >".$row["Titol"]."</option>";
		}else
		{
			$resultado = $resultado."<option value=".$row["IdLinMD"] .">".$row["Titol"]."</option>";
		}
	}
}

echo $resultado;

?>
