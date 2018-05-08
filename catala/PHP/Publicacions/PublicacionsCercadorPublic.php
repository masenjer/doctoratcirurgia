<?php

function MostraPublicacionsPublic($txt,$tipus)
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
		
		$SQL = "SELECT COUNT(*) AS CuentaRows FROM Publicacions WHERE ".$cond." AND Tipus =".$t;
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		 while ($row = $result->fetch_assoc())
		{
			$CuentaRows = $row["CuentaRows"];
		}

		if ($t == "0") 	$TitolCapca = "Articles relacionats amb la cerca";
		else			$TitolCapca = "Llibres relacionats amb la cerca";				
				
		echo '
			<table class="fuenteContingut" width="80%">	
				<tr>
					<td colspan="2" style="padding-bottom:30px;padding-top:20px;" align="left" class="fuenteTitolContingut">'.$TitolCapca.' ('.$CuentaRows.')</td>
				</tr>
			';
		
		//echo $SQL;
		$SQL = "SELECT * FROM Publicacions WHERE ".$cond." AND Tipus =".$t." ORDER BY Titol";
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		 while ($row = $result->fetch_assoc())
		{
			echo'
			<tr>
				<td width="110px"  style="padding-left:15px;">T&iacute;tol:</td>
				<td>'.$row["Titol"].'</td>
			</tr>
			<tr>
				<td style="padding-left:15px;">Autor:</td>
				<td>'.$row["Autor"].'</td>
			</tr>
			<tr>
				<td style="padding-left:15px; padding-right:5px;">L&iacute;nies de Recerca:</td>
				<td>'.$row["Linies"].'</td>
			</tr>
			<tr>
				<td style="padding-left:15px;">Any:</td>
				<td>'.$row["Any"].'</td>
			</tr>
			<tr>
				<td style="padding-left:15px; padding-bottom:10px;">Revista:</td>
				<td style="padding-bottom:10px;">'.$row["Revista"].'</td>
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