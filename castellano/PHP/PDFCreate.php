<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
require(($_SERVER['DOCUMENT_ROOT']."/vendor/dompdf/dompdf_config.inc.php"); 

error_reporting(0);

$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
$op = mysqli_real_escape_string($mysqli,$_GET["op"]);
 
switch($op)
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
	//$IdCap = $row["IdCapMenu"];
}

$Text = utf8_decode(
	'<p><b>'.$Titol.'</b></p><br><br><p>'.$Contingut.'</p>');


$dompdf = new DOMPDF();
$dompdf->load_html($Text);
$dompdf->render();
$dompdf->stream("../PDF/".$id."_".$op."sample.pdf");
?>