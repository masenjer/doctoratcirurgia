<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php");

session_start();

if ($_SESSION["Creacio"]){

	$Tipus = Pon(mysqli_real_escape_string($mysqli,$_POST["Tipus"]));
	$Autor = Pon(mysqli_real_escape_string($mysqli,$_POST["Autor"]));
	$Titol = Pon(mysqli_real_escape_string($mysqli,$_POST["Titol"]));
	$Any = Pon(mysqli_real_escape_string($mysqli,$_POST["Any"]));
	$Linies = Pon(mysqli_real_escape_string($mysqli,$_POST["Linies"]));
	$Revista = Pon(mysqli_real_escape_string($mysqli,$_POST["Revista"]));

	$SQL = "INSERT INTO Publicacions(Tipus, Autor, Titol, Any, Linies, Revista) VALUES (".$Tipus.",'".$Autor."','".$Titol."','".$Any."','".$Linies."','".$Revista."')  ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	echo $SQL;

}
?>