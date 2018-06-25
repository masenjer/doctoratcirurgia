<?php
function UDDirectoriCargaSelect($idCat, $Conn){

	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$resultado = array();
	
	switch ($_SESSION["IdSite"]){
		case 0: $idioma = "_ca";
				break;
		case 1: $idioma = "_es";
				break;
		case 2: $idioma = "_en";
				break;					
	}
	
	$SQL = "SELECT * FROM UnitatDocent ORDER BY Orden ";	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


	$resultado[1] = '<option value="0">----------------------------------</option>';
	
	 while ($row = $result->fetch_assoc())
	{
		if ($row["IdUnitatDocent"] == $idCat){
			$resultado[0] = $row["Titol".$idioma];
			$selected = " selected";
		} 
		else $selected = "";
		
		$resultado[1].='<option value="'.$row["IdUnitatDocent"] .'" '.$selected.'>'.$row["Titol".$idioma].'</option>';
	}
	
	return $resultado;
}
?>