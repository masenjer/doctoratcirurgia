<?php

function MostraPublicacionsPrivat($txt,$tipus)
{
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
	
	foreach ($txt as $v)
	{
		if ($cond) $cond.=" AND ";
		
		$cond .= "(Autor LIKE '%".$v."%' OR Titol LIKE '%".$v."%' OR Any LIKE '%".$v."%' OR Linies LIKE '%".$v."%' OR Revista LIKE '%".$v."%')";
	}
	
	switch ($tipus)
	{
		case "0":
		case "1":	$ArrayTipus = array($tipus);
					break;
		
		default:	$ArrayTipus = array(0,1);
					break;						
	}	
			
	foreach ($ArrayTipus as $t)
	{	
		if ($t == "0") 	$TitolCapca = "Articles relacionades amb la cerca";
		else			$TitolCapca = "Llibres relacionats amb la cerca";				
		
		///Carrega options del select tipus
		$options = "";
		$labelOpTipus = array("Article","Llibre");
		
		for ($i=0;$i<2;$i++)
		{
			if ($i == $t) $selected = " selected";
			else $selected = "";
			
			$options.= '<option value="'.$i.'" '.$selected.'>'.$labelOpTipus[$i].'</option>';
		}		
				
		echo '
			<table class="fuenteContingut" width="80%">	
				<tr>
					<td style="padding-bottom:30px;padding-top:20px;" align="left" class="fuenteTitolContingut">'.$TitolCapca.'</td>
				</tr>
			';
		
		//echo $SQL;
		$SQL = "SELECT * FROM Publicacions WHERE ".$cond." AND Tipus =".$t." ORDER BY Titol";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		 while ($row = $result->fetch_assoc())
		{
			echo'
			<tr>
				<td  style="padding-right:20px;padding-left:15px;">T&iacute;tol:</td>
				<td>
					<input style="width:100%;" type="text" id="TitolEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Titol"].'">
					</td>
			</tr>
			<tr>
				<td style="padding-right:20px;padding-left:15px;">Autor:</td>
				<td>					
					<input style="width:100%;" type="text" id="AutorEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Autor"].'"> </td>
			</tr>
			<tr>
				<td style="padding-right:20px;padding-left:15px;">L&iacute;nies de Recerca:</td>
				<td><input type="text" id="LiniesEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Linies"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td style="padding-right:20px;padding-left:15px;">Any:</td>
				<td><input type="text" id="AnyEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Any"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td style="padding-right:20px;padding-left:15px;">Revista:</td>
				<td><input type="text" id="RevistaEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut"  value="'.$row["Revista"].'" style="width:100%;"></td>
			</tr>
			<tr>
				<td style="padding-right:20px;padding-left:15px;">Tipus:</td>
				<td>
					<select id="TipusEditaPublicacions'.$row["IdPublicacions"].'" class="fuenteContingut">
						'.$options.'
					</select>	
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<button class="fuenteContingut" onclick="PublicacionsUpdate('.$row["IdPublicacions"].')">Guardar els canvis al registre</button><button class="fuenteContingut" onclick="MostraPublicacionsDelete('.$row["IdPublicacions"].')">Elimina registre</button>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-bottom:20px; border-top:1px solid #ddd;">
			<tr>			
			';
		}
		
	echo'
		</table>';
	}
	echo '|';
	
	ComptadorResultatsPublicacions($cond,$tipus);
}
?>