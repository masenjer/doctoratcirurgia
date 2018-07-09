<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include("Fechas.php");
include("CS.php"); 

session_start();

if (CS()&&$_SESSION["Noticias"])
{
	$T = mysqli_real_escape_string($mysqli,$_POST["T"]);
	$T = Pon($T);
	$C = mysqli_real_escape_string($mysqli,$_POST["C"]);
	$C = Pon($C);
	$F = mysqli_real_escape_string($mysqli,$_POST["F"]);
	$F = $F;
//	$FP = mysqli_real_escape_string($mysqli,$_POST["FP"]);
//	$FP = InsertFecha($FP);
//	$FD = mysqli_real_escape_string($mysqli,$_POST["FD"]);
//	$FD = InsertFecha($FD);
	$IMG = mysqli_real_escape_string($mysqli,$_POST["IMG"]);
	$id = mysqli_real_escape_string($mysqli,$_POST["id"]);
	$NOU = mysqli_real_escape_string($mysqli,$_POST["NOU"]);
	$NOU = Pon($NOU);

	
	$FP = date('Y/m/d');
	$FD = date('Y/m/d');
	
	if ($id == "")
	{	
		$SQL = "INSERT INTO Noticias(Titol, Cos, FechaNot, FechaPub, FechaDesPub, Image, NOU, IdSite) VALUES ('$T','$C','$F','$FP','$FD','$IMG',$NOU,".$_SESSION["IdSite"].")";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

			//echo $SQL;

		
		$SQL = "SELECT IdNoticia FROM Noticias ORDER BY IdNoticia DESC LIMIT 1";
		//echo $SQL;
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

			//echo $SQL;

		
		while($row = mysqli_fetch_array($result))
		{
			$id = $row["IdNoticia"]; 
			//echo ",".$id;	
		}
	
	}
	else
	{
		$SQL = "UPDATE Noticias SET 
					Titol = '$T',
					Cos = '$C', 
					FechaNot = '$F', 
					FechaPub = '$FP', 
					FechaDesPub = '$FD',
					Image = '$IMG',
					NOU = $NOU,
					IdSite = ".$_SESSION["IdSite"]."
					WHERE IdNoticia = $id";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

	}
	
	echo $id;
}
?>