<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
session_start();
 
$sel = mysqli_real_escape_string($mysqli,$_GET["sel"]);


$SQL = "SELECT * FROM CapMenu WHERE IdSite = ".$_SESSION["IdSite"]." order by Orden";
 
$resultado = "<option value=0>----------------------------------</option>";

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){
	
	
	if ($row["IdCapMenu"] == $sel)
	{		
		$resultado = $resultado."<option value=".$row["IdCapMenu"]." selected >".$row["Titol"]."</option>";
	}else
	{
		$resultado = $resultado."<option value=".$row["IdCapMenu"] .">".$row["Titol"]."</option>";
	}
}

$resultado = $resultado.'<option value="Ocultes" style="background:#666; color: #FFF;">Ocultes</option>';


echo $indice."|".$resultado;

?>
