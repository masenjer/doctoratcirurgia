<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php");

session_start();

if ($_SESSION["Edicio"]){


	$id = Pon(mysqli_real_escape_string($mysqli,$_POST["id"]));
	$n = Pon(mysqli_real_escape_string($mysqli,$_POST["n"]));
	$c = Pon(mysqli_real_escape_string($mysqli,$_POST["c"]));
	$d = Pon(mysqli_real_escape_string($mysqli,$_POST["d"]));
	$u = Pon(mysqli_real_escape_string($mysqli,$_POST["u"]));
	$t = Pon(mysqli_real_escape_string($mysqli,$_POST["t"]));
	$e = Pon(mysqli_real_escape_string($mysqli,$_POST["e"]));
	$cat1 = Pon(mysqli_real_escape_string($mysqli,$_POST["cat1"]));
	$cat2 = Pon(mysqli_real_escape_string($mysqli,$_POST["cat2"]));
	$IMG = Pon(mysqli_real_escape_string($mysqli,$_POST["IMG"]));
	$Carrec =  Pon(mysqli_real_escape_string($mysqli,$_POST["Carrec"]));
	$Adreca =  Pon(mysqli_real_escape_string($mysqli,$_POST["Adreca"]));
	$Xarxes =  Pon(mysqli_real_escape_string($mysqli,$_POST["Xarxes"]));

	$condIMG = "";

	if ($IMG)
	{
		$SQL = "SELECT Imatge FROM Directori WHERE IdDirectori = ".$id;	
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


		 while ($row = $result->fetch_assoc())
		{
			if ($row["Imatge"]){
				if(file_exists("../../../imgDirectori/".$row["Imatge"]))unlink("../../../imgDirectori/".$row["Imatge"]);
				
			}
		}
		$condIMG = ", Imatge = '".$id.$IMG."'";
	}
	else $condIMG = "";

		if ($d) $Despatx = " Despatx='".$d."',";
		if ($u) $Ubicacio = " Ubicacio='".$u."', ";
		if ($Carrec) $Carrec = " Carrec='".$Carrec."', ";
		if ($Adreca) $Adreca = " Adreca='".$Adreca."', ";
		if ($Xarxes) $Xarxes = " Xarxes='".$Xarxes."', ";

		$SQL = "
			UPDATE  Directori 
			SET 	Nom='".$n."', 
					Cognoms='".$c."',".
					$Despatx.
					$Ubicacio.
					$Carrec.
					$Adreca.
					$Xarxes." 
					Ubicacio='".$u."', 
					Telefon='".$t."', 
					IdDirectoriCategoria1='".$cat1."', 
					IdDirectoriCategoria2='".$cat2."', 
					Email='".$e."' 
					".$condIMG." 
			WHERE IdDirectori = ".$id;
			
			//echo $SQL;

	if ($result = mysql_query($SQL,$oConn)) echo $id."|".$IMG;
	else die("Error:".mysql_error($oConn));

}
?>