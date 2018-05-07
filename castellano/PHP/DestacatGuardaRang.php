<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

session_start();

if ($_SESSION["Edicio"]){

$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
$rang = mysqli_real_escape_string($mysqli,$_GET["rang"]);

$SQL = "UPDATE Destacat SET Orden = ".$rang." WHERE IdDestacat =" . $id;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 

}
?>
