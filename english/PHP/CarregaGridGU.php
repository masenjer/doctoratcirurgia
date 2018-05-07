<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

$SQL = "SELECT * FROM Users";

$resultado = '
<input type="hidden" id="LineaGridActiu">
	<table width="640px" height="200px" cellpadding="0" cellspacing="0" border="0">
		<tr class="CapGrid">
			<td width="10px" background="/img/Grid/CSI.png"></td>
			<td height="27px" background="/img/Grid/CSC.png">&nbsp;&nbsp;&nbsp;Usuario</td>
			<td height="27px" width="70px" background="/img/Grid/CSC.png" align="center">Usuario</td>
			<td height="27px" width="70px" background="/img/Grid/CSC.png" align="center">Creación</td>
			<td height="27px" width="70px" background="/img/Grid/CSC.png" align="center">Edición</td>
			<td height="27px" width="59px" background="/img/Grid/CSC.png" align="right">Home</td>
			<td width="11px" background="/img/Grid/CSD.png"></td>
		</tr>';

$i = 0;

if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc())
{
	if (($i % 2)!=0)
	{
		$color = '';//' background="/img/Grid/GrisTrans.png"';
	}
	else
	{
		$color = '';	
	}
	 
	$i++;
	
	$resultado = $resultado.'
		<tr>
			<td id="GridGU'.$row["IdUser"].'" colspan="7" height="18px" '.$color.' onclick="CarregaUserGU('.$row["IdUser"].');" onmouseover="EncenLineaGrid('.$row["IdUser"].')" onmouseout="ApagaLineaGrid('.$row["IdUser"].');" style="cursor:pointer;">
				<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
					<tr valign="middle">
						<td width="1px" bgcolor="#bababa"></td>
						<td width="9px"></td>
						<td>'.$row["Nom"].' '.$row["Cognoms"].'</td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center">'.BuscaVerdadero($row["Usuarios"]).'</td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center">'.BuscaVerdadero($row["Creacio"]).'</td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center">'.BuscaVerdadero($row["Edicio"]).'</td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="59px" align="center">'.BuscaVerdadero($row["Noticias"]).'</td>
						<td width="10px"></td>
						<td width="1px" bgcolor="#bababa"></td>
					</tr>
				</table>
			</td>
		</tr>
				
	';
	
//	$T = $row["Titol"];
//	$C = $row["Cos"];
//	$F = SelectFecha($row["FechaNot"]);
//	$FP = SelectFecha($row["FechaPub"]);
//	$FD = SelectFecha($row["FechaDesPub"]);
//	
}

$resultado = $resultado.'
		<tr>
			<td colspan="7">
				<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">				
					<tr>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="9px"></td>
						<td></td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center"></td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center"></td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="69px" align="center"></td>
						<td width="1px" bgcolor="#bababa"></td>
						<td width="59px" align="center"></td>
						<td width="10px"></td>
						<td width="1px" bgcolor="#bababa"></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="7" height="9px">
				<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">				
					<tr>
						<td width="10px" style="background:URL(/img/Grid/CII.png);background-repeat: repeat-y;"></td>
						<td style="background:URL(/img/Grid/CIC.png);background-repeat: repeat-x;"></td>
						<td  bgcolor="#bababa" width="1px" bgcolor="#bababa"></td>
						<td style="background:URL(/img/Grid/CIC.png);background-repeat: repeat-x;" width="69px" align="center"></td>
						<td  bgcolor="#bababa" width="1px" bgcolor="#bababa"></td>
						<td style="background:URL(/img/Grid/CIC.png);background-repeat: repeat-x;" width="69px" align="center"></td>
						<td  bgcolor="#bababa" width="1px" bgcolor="#bababa"></td>
						<td style="background:URL(/img/Grid/CIC.png);background-repeat: repeat-x;" width="69px" align="center"></td>
						<td  bgcolor="#bababa" width="1px" bgcolor="#bababa"></td>
						<td  style="background:URL(/img/Grid/CIC.png);background-repeat: repeat-x;"width="59px" align="center"></td>
						<td width="11px" background="/img/Grid/CID.png"></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>';

// 

//echo $T."|".$C."|".$F."|".$FP."|".$FD."|".$id;
echo $resultado;

?>

<?php
function BuscaVerdadero($v)
{
	if ($v == "1")
	{
		return '<img src="/img/Grid/true.png">';	
	}else
	{
		return "";	
	}	
}
?>