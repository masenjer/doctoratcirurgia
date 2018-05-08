<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
session_start();

if ($_SESSION["Edicio"]){

	$SQL = "UPDATE Directori SET ".mysqli_real_escape_string($mysqli,$_POST["form"])."='".mysqli_real_escape_string($mysqli,$_POST["txt"])."' WHERE IdDirectori = ".mysqli_real_escape_string($mysqli,$_POST["id"]);
	if ($result = mysql_query($SQL,$oConn)) echo "Informació guardada correctament";
	else echo "Hi ha hagut algun problema al guardar la informació, torni a provar-ho i, si el problema persisteix, posis en contacte amb el CRD al 93 581 40 55 o enviant un correu a crfm@uab.cat";

	//echo $SQL;

	//echo $idCap;//."|".$IdLin;
}
?>