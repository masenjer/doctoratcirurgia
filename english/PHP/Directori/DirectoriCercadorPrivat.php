<?php
function MostraDirectoriPrivat($txt, $Conn, $idC)
{
	header('Content-type: text/html; charset=utf-8');

	session_start();
	include($Conn); 
	
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
	
	$SQL = "SELECT D.*, DC.Titol".$idioma.", DC.IdDirectoriCategoria FROM Directori D 
			LEFT JOIN DirectoriCategoria DC 
			ON (DC.IdDirectoriCategoria = D.IdDirectoriCategoria1 OR  DC.IdDirectoriCategoria = D.IdDirectoriCategoria2) ";
	
	if ($cond) $SQL .= " WHERE ".$cond."";
	
	$SQL .= " ORDER BY DC.Orden, D.Cognoms, D.Nom ASC ";

	
	$resFin .= '
		<table class="fuenteContingut">	';
	
	//$resFin .= $SQL;
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
	
	 while ($row = $result->fetch_assoc())
	{
		if (!$idC || $idC == $row["IdDirectoriCategoria"]){
			
			$arrayCategoria1 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria1"], $Conn);
			$selectCategoria1 = $arrayCategoria1[1];
	
			$arrayCategoria2 = CategoriaDirectoriCargaSelect($row["IdDirectoriCategoria2"], $Conn);
			$selectCategoria2 = $arrayCategoria2[1];
	
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
					<button class="fuenteContingut" onClick="EditaFitxaDirectoriPersonal('.$row["IdDirectori"].');">Editar dades de fitxa personal</button>
				</td>
			</tr>
			<tr>
				<td rowspan="7" style="padding-right:20px;">'.$IMG.'</td>
				<td  style="padding-right:20px;">Nom i Cognoms:</td>
				<td>
					<input type="text" id="NomEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Nom"].'">
					<input type="text" id="CognomsEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Cognoms"].'"> </td>
			</tr>
			<tr>
				<td>Despatx:</td>
				<td style="padding-right:5px;"><input type="text" id="DespatxEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Despatx"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td>Ubicacio:</td>
				<td style="padding-right:5px;"><input type="text" id="UbicacioEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Ubicacio"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td>Tel&egrave;fon:</td>
				<td style="padding-right:5px;"><input type="text" id="TelefonEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Telefon"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td style="padding-right:5px;"><input type="text" id="EmailEditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut"  value="'.$row["Email"].'" style="width:100%;"></a></td>
			</tr>'.
	/*		<tr>
				<td style="padding-bottom:10px">Substituir imatge:</td>
				<td style="padding-bottom:10px">
					<form  ENCTYPE="multipart/form-data" id="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" name="FormPujaEditaIMGDirectori'.$row["IdDirectori"].'" method="post" action="PHP/UploadFiles.php?op=1" target="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'">
						<input type="file" id="ImatgeEditaDirectori'.$row["IdDirectori"].'" name="ImatgeEditaDirectori'.$row["IdDirectori"].'" class="fuenteContingut" />
					</form>
					<iframe name="IframePujaEditaIMGDirectori'.$row["IdDirectori"].'" style="display:none"></iframe> 
				</td>
			</tr>
	*/'
			<tr>
				<td>Categoria1:</td>
				<td><select id="Categoria1EditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut" style="width:100%;">'.$selectCategoria1.'</select></td>
			</tr>
			<tr>
				<td>Categoria2:</td>
				<td><select id="Categoria2EditaDirectori'.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'" class="fuenteContingut" style="width:100%;">'.$selectCategoria2.'</select></td>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<button class="fuenteContingut" onclick="DirectoriUpdate(\''.$row["IdDirectori"].'_'.$row["IdDirectoriCategoria"].'\')">Guardar els canvis al registre</button><button class="fuenteContingut" onclick="MostraDirectoriDelete('.$row["IdDirectori"].')">Elimina registre</button>
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