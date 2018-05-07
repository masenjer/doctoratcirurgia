<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

$id = mysqli_real_escape_string($mysqli,$_GET["id"]);

$SQL = "SELECT * FROM Users WHERE IdUser = ".$id;

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){

	$N = $row["Nom"];
	$C = $row["Cognoms"];
	$E= $row["Email"];
	$U = $row["User"];
	$P = $row["Password"];
	$R1 = $row["Usuarios"];
	$R2 = $row["Creacio"];
	$R3 = $row["Edicio"];
	$R4 = $row["Noticias"];
	
	
}


echo $N."|".$C."|".$E."|".$U."|".$P."|".$R1."|".$R2."|".$R3."|".$R4."|".$id;

?>