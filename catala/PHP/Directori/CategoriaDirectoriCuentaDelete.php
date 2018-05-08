<?php

error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

ini_set('session.cache_expire',3);
ini_set("session.gc_maxlifetime",3);
session_start();

$idCat = mysqli_real_escape_string($mysqli,$_POST["IdCat"]);

$cuenta = 0;

$SQL = "SELECT COUNT(*) as Cuenta FROM Directori WHERE IdDirectoriCategoria = ".$idCat;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc()){
	$cuenta = $row["Cuenta"];	
}

echo $idCat."|".$cuenta;
?>