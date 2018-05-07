<?php
function MostraDirectoriPublic($txt, $Conn, $idC)
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
		<table  cellpadding="0" cellspacing="0" border="0" class="fuenteContingut">	';
	
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
				<td colspan="3" align="left" class="TitolCategoriaDirectori">'.$titolCat.'</td>
			</tr>
			<tr>
				<td height="30px"></td>
			</tr>	
				';
				$idCategoriaActual = $row["IdDirectoriCategoria"];
			}

			if ($row["Perfil"]||$row["Inves"]||$row["Publi"]){
				$nom = '<a href="profile.php?id='.$row["IdDirectori"].'" class="NomLlistatDirectori">'.$row["Nom"].' '.$row["Cognoms"].'</a>';
				$info = '<a href="profile.php?id='.$row["IdDirectori"].'" class="InfoLlistatDirectori">+ Informaci&oacute;</a>';	
			}
			else {
				$nom = '<span class="NomLlistatDirectori">'.$row["Nom"].' '.$row["Cognoms"].'</span>';	
				$info = '';	
			}
			
			if ($row["Imatge"]) $IMG = '<img class="IMGFitxaDirectoriLlistat" src="../IMGDirectori/'.$row["Imatge"].'" style="width:100px;" alt="'.$row["Nom"].' '.$row["Cognoms"].'" title="'.$row["Nom"].' '.$row["Cognoms"].'">';
			else $IMG = "";
			$resFin .= '
			<tr>
				<td width="110px" rowspan="6">'.$IMG.'</td>
				<td colspan="2">'.$nom.'</td>
			</tr>
			<tr>
				<td colspan="2"><span class="CarrecLlistatDirectori">'.$row["Carrec"].'</span> </td>
			</tr>
			<tr>
				<td>Despatx:</td>
				<td>'.$row["Despatx"].'</td>
			</tr>
			<tr>
				<td>Ubicaci&oacute;:</td>
				<td>'.$row["Ubicacio"].'</td>
			</tr>
			<tr>
				<td>Tel&egrave;fon:</td>
				<td>'.$row["Telefon"].'</td>
			</tr>
			<tr valign="top">
				<td>Email:</td>
				<td><a href="mailto:'.$row["Email"].'">'.$row["Email"].'</a><div style="float:right">'.$info.'</div></td>
			</tr>
			<tr>
				<td height="10px"></td>
			</tr>
			<tr>
				<td colspan="3" style="padding-bottom:10px; border-top:1px solid #ddd;">
			<tr>			
			';
		}
	}
	
	$resFin .='
		</table>|';
	
	$num_filas =$result->num_rows;
	
	$resFin .= ComptadorResultatsDirectori($num_filas);
	
	return ($resFin);
}
?>