<?php
function MostraDirectoriPrivat($txt, $idC, $idUD)
{
	header('Content-type: text/html; charset=utf-8');

	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$idCategoriaActual = 'inicializa';
	
	switch ($_SESSIOM["IdSite"]){
		case 0: $idioma = "_ca";
				break;
		case 1: $idioma = "_es";
				break;
		case 2: $idioma = "_en";
				break;					
	}

	
	if ($txt)
	{	
		foreach ($txt as $v)
		{
			if ($cond) $cond.=" AND ";
			
			$cond .= " (Nom LIKE '%".$v."%' OR Cognoms LIKE '%".$v."%' OR Despatx LIKE '%".$v."%' OR Ubicacio LIKE '%".$v."%' OR Telefon LIKE '%".$v."%' OR Email LIKE '%".$v."%')";
		}
	}

	if ($idC){
		if ($cond) $cond.=" AND ";
		$cond .= " (IdDirectoriCategoria1 = ".$idC." OR IdDirectoriCategoria2 = ".$idC.") ";
	}
	
	if ($idUD){
		if ($cond) $cond.=" AND ";
		$cond .= " (IdUnitatDocent1 = ".$idUD." OR IdUnitatDocent2 = ".$idUD.") ";
	}
	
	$SQL = "SELECT D.*, DC.Titol".$idioma.", DC.IdDirectoriCategoria, UD1.Titol".$idioma." as TUD1, UD2.Titol".$idioma." as TUD2, Tutor FROM Directori D 
			LEFT JOIN DirectoriCategoria DC 
			ON (DC.IdDirectoriCategoria = D.IdDirectoriCategoria1 OR  DC.IdDirectoriCategoria = D.IdDirectoriCategoria2) 
			LEFT JOIN UnitatDocent UD1 
			ON UD1.IdUnitatDocent = D.IdUnitatDocent1 
			LEFT JOIN UnitatDocent UD2 
			ON UD2.IdUnitatDocent = D.IdUnitatDocent2 
			";
	
	if ($cond) $SQL .= " WHERE ".$cond."";
	
	$SQL .= " ORDER BY DC.Orden, D.Cognoms, D.Nom ASC ";
	
	$resFin .= '
		<table>	';
	
	//$resFin .= $SQL;
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	
	 while ($row = $result->fetch_assoc())
	{	
		//echo "tutor:".$row["Tutor"].";";

		$checked = ($row["Tutor"])?"checked":""; 

		if (!$idC || $idC == $row["IdDirectoriCategoria"] || $idUD == $row["IdUnitatDocent"]){

			$arrayCategoria1 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria1"], $Conn);
			$selectCategoria1 = $arrayCategoria1[1];

			$arrayCategoria2 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria2"], $Conn);
			$selectCategoria2 = $arrayCategoria2[1];

			$arrayUnitatDocent1 = UDDirectoriCargaSelect($row["IdUnitatDocent1"], $Conn);
			$selectUnitatDocent1 = $arrayUnitatDocent1[1];

			$arrayUnitatDocent2 = UDDirectoriCargaSelect($row["IdUnitatDocent2"], $Conn);
			$selectUnitatDocent2 = $arrayUnitatDocent2[1];

			if ($idCategoriaActual != $row["IdDirectoriCategoria"]){
				$arrayCategoria = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria"], $Conn);
				$titolCat = $arrayCategoria[0];
				
				$resFin .= '
			<tr>
				<td colspan="3" align="left" class="fuenteTitolContingut">'.$titolCat.'</td>
			</tr>	
				';
				
				$idCategoriaActual = $row["IdDirectoriCategoria"];
			}


			
			if ($row["Imatge"]) $IMG = '<img class="IMGFitxaDirectoriLlistat" src="../IMGDirectori/'.$row["Imatge"].'" style="width:100px;">';
			else $IMG = "";
			$resFin .='
			<tr>
				<td colspan="3" align="right">
					<button class="btn btn-secondary" onClick="EditaFitxaDirectoriPersonal('.$row["IdDirectori"].');">Editar dades de fitxa personal</button>
				</td>
			</tr>
			<tr>
				<td rowspan="10" style="padding-right:20px;">'.$IMG.'</td>
				<td  style="padding-right:20px;">Nom :</td>
				<td>
					<input type="text" id="NomEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Nom"].'">
					</td>
			</tr>
			<tr>
				<td  style="padding-right:20px;">Cognoms:</td>
				<td>
					<input type="text" id="CognomsEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Cognoms"].'"> </td>
			</tr>
			<tr>
				<td>Email:</td>
				<td style="padding-right:5px;"><input type="text" id="EmailEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Email"].'" style="width:100%;"></a></td>
			</tr>
			<tr>
				<td>Àrea de coneixement 1:</td>
				<td><select id="Categoria1EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$selectCategoria1.'</select></td>
			</tr>
			<tr>
				<td>Àrea de coneixement 2:</td>
				<td><select id="Categoria2EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$selectCategoria2.'</select></td>
			</tr>
			<tr>
				<td>Especialitat (Català):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_caEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_ca"].'" style="width:100%;"></a></td>
			</tr>
			<tr>
				<td>Especialitat (Castellano):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_esEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_es"].'" style="width:100%;"></a></td>
			</tr>
			<tr>
				<td>Especialitat (English):</td>
				<td style="padding-right:5px;"><input type="text" id="Especialitat_enEditaDirectori'.$row["IdDirectori"].'" class="form-control"  value="'.$row["Especialitat_en"].'" style="width:100%;"></a></td>
			</tr>

'.
	/*		<tr>
				<td style="padding-bottom:10px">Substituir imatge:</td>
				<td style="padding-bottom:10px">
					<form  ENCTYPE="multipart/form-data" id="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" name="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'">
						<input type="file" id="ImatgeEditaDirectori'.$row["IdDirectori"].'" name="ImatgeEditaDirectori'.$row["IdDirectori"].'" class="form-control" />
					</form>
					<iframe name="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'" style="display:none"></iframe> 
				</td>
			</tr>
	*/'
			<tr>
				<td>Unitat Docent 1:</td>
				<td><select id="UD1EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$selectUnitatDocent1.'</select></td>
			</tr>
			<tr>
				<td>Unitat Docent 2:</td>
				<td><select id="UD2EditaDirectori'.$row["IdDirectori"].'" class="form-control" style="width:100%;">'.$selectUnitatDocent2.'</select></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div class="custom-control custom-checkbox">
					  <input type="checkbox" class="custom-control-input" id="tutor'.$row["IdDirectori"].'" '.$checked.'>
					  <label class="custom-control-label" for="tutor'.$row["IdDirectori"].'">és tutor</label>
					</div>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<button class="btn btn-success" onclick="DirectoriUpdate(\''.$row["IdDirectori"].'\')">Guardar els canvis al registre</button><button class="btn btn-danger" onclick="MostraDirectoriDelete('.$row["IdDirectori"].')">Elimina registre</button>
				</td>
			</tr>
			<tr>
				<td height="15px"></td>
			</tr>
			<tr>
				<td colspan="3" style="padding-bottom:20px; border-top:1px solid #ddd;">
			<tr>			
			';
		}
	}
	
	$resFin .='
		</table>|';
	
	$num_filas = $result->num_rows;
	
	$resFin .= ComptadorResultatsDirectori($num_filas);
	

	return ($resFin);

}
?>

