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
	$es_ca = Pon(mysqli_real_escape_string($mysqli,$_POST["es_ca"]));
	$es_es = Pon(mysqli_real_escape_string($mysqli,$_POST["es_es"]));
	$es_en = Pon(mysqli_real_escape_string($mysqli,$_POST["es_en"]));
	$Tesis = Pon(mysqli_real_escape_string($mysqli,$_POST["Tesis"]));
	$Horari = Pon(mysqli_real_escape_string($mysqli,$_POST["Horari"]));
	$cat1 = Pon(mysqli_real_escape_string($mysqli,$_POST["cat1"]));
	$cat2 =($_POST["cat2"])?Pon(mysqli_real_escape_string($mysqli,$_POST["cat2"])):"";
	$ud1 = Pon(mysqli_real_escape_string($mysqli,$_POST["ud1"]));
	$ud2 =($_POST["ud2"])?Pon(mysqli_real_escape_string($mysqli,$_POST["ud2"])):"";
	$IMG = Pon(mysqli_real_escape_string($mysqli,$_POST["IMG"]));
	$Carrec_ca =  Pon(mysqli_real_escape_string($mysqli,$_POST["Carrec_ca"]));
	$Carrec_es =  Pon(mysqli_real_escape_string($mysqli,$_POST["Carrec_es"]));
	$Carrec_en =  Pon(mysqli_real_escape_string($mysqli,$_POST["Carrec_en"]));
	$Adreca =  Pon(mysqli_real_escape_string($mysqli,$_POST["Adreca"]));
	$Xarxes =  Pon(mysqli_real_escape_string($mysqli,$_POST["Xarxes"]));
	$tutor =  Pon(mysqli_real_escape_string($mysqli,$_POST["tutor"]));

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
		if ($t) $Telefon = " Telefon='".$t."', ";
		if ($Horari) $Horari = " Horari='".$Horari."', ";
		if ($Tesis) $Tesis = " Tesis='".$Tesis."', ";
		if ($Carrec_ca) $Carrec_ca = " Carrec_ca='".$Carrec_ca."', ";
		if ($Carrec_es) $Carrec_es = " Carrec_es='".$Carrec_es."', ";
		if ($Carrec_en) $Carrec_en = " Carrec_en='".$Carrec_en."', ";
		if ($Adreca) $Adreca = " Adreca='".$Adreca."', ";
		if ($Xarxes) $Xarxes = " Xarxes='".$Xarxes."', ";
		if ($cat2) $cat2 = " IdDirectoriCategoria2='".$cat2."', ";
		if ($ud2) $ud2 = " IdUnitatDocent2='".$ud2."', ";

		$SQL = "
			UPDATE  Directori 
			SET 	Nom='".$n."', 
					Cognoms='".$c."',
					Especialitat_ca='".$es_ca."',
					Especialitat_es='".$es_es."',
					Especialitat_en='".$es_en."',".
					$Despatx.
					$Ubicacio.
					$Telefon.
					$Tesis.
					$Carrec_ca.
					$Carrec_es.
					$Carrec_en.
					$Adreca.
					$Horari.
					$Xarxes." 
					IdDirectoriCategoria1='".$cat1."', 
					".$cat2." 
					IdUnitatDocent1='".$ud1."',
					Tutor='".$tutor."', 
					".$ud2." 
					Email='".$e."' 
					".$condIMG." 
			WHERE IdDirectori = ".$id;
			
		//echo $SQL;

	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

}
?>