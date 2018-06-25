<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php");

if ($_SESSION["Creacio"]){


	$n = Pon(mysqli_real_escape_string($mysqli,$_POST["n"]));
	$c = Pon(mysqli_real_escape_string($mysqli,$_POST["c"]));
	$es_ca = Pon(mysqli_real_escape_string($mysqli,$_POST["es_ca"]));
	$es_es = Pon(mysqli_real_escape_string($mysqli,$_POST["es_es"]));
	$es_en = Pon(mysqli_real_escape_string($mysqli,$_POST["es_en"]));
	$e = Pon(mysqli_real_escape_string($mysqli,$_POST["e"]));
	$cat1 = Pon(mysqli_real_escape_string($mysqli,$_POST["cat1"]));
	$cat2 = Pon(mysqli_real_escape_string($mysqli,$_POST["cat2"]));
	$ud1 = Pon(mysqli_real_escape_string($mysqli,$_POST["ud1"]));
	$ud2 = Pon(mysqli_real_escape_string($mysqli,$_POST["ud2"]));
	$IMG = Pon(mysqli_real_escape_string($mysqli,$_POST["IMG"]));

$SQL = "INSERT INTO Directori(Nom, Cognoms, Especialitat_ca, Especialitat_es, Especialitat_en, Email, Imatge, IdDirectoriCategoria1, IdDirectoriCategoria2, IdUnitatDocent1, IdUnitatDocent2) VALUES ('".$n."','".$c."','".$es_ca."','".$es_es."','".$es_en."','".$e."','".$IMG."','".$cat1."','".$cat2."','".$ud1."','".$ud2."')  ";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$SQL = "Select IdDirectori FROM Directori ORDER BY IdDirectori DESC LIMIT 1";
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	 while ($row = $result->fetch_assoc())
	{
		$id = $row["IdDirectori"];
	}

	if ($IMG)
	{
		$SQL = "UPDATE Directori SET Imatge = '".$id.$IMG."' WHERE IdDirectori = ".$id;
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	}

	echo $id."|".$IMG;

} 

?>