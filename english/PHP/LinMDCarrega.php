<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

ini_set("session.gc_maxlifetime",3);
session_start();


$SQL = "SELECT * FROM Destacat WHERE IdSite =".$_SESSION["IdSite"]."  order by Orden ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">
	<tr>
		<td height="30px"></td>
	</tr>
	';


 while ($row = $result->fetch_assoc())
{
	$resultado = $resultado . '
	<tr valign="middle">';

		if ($row["TipusEnllac"] == 1)
		{
			$accion = ' onClick="CarregaEnllacIntern(\''.$row["URL"].'\');"'; 
		}else
		{
			if ($row["TipusEnllac"] == 2) 	$accion = ' onClick="window.open(\''.$row["URL"].'\');"'; 
			else $accion = ' onClick="window.open(\'Documents/'.$row["URL"].'\');"'; 
		}
		
	if($row["FormatBoto"] == 1)
	{
		$resultado = $resultado . '
			<td width="188px" height="41px" id="MenuDestacats'.$row["IdDestacat"].'" '.$accion.' background="ImgDes/'.$row["Imatge"].'"></td>		
		</tr>';
	}	
	else
	{	
		$resultado = $resultado . '
			<td height="41px" id="MenuDestacats'.$row["IdDestacat"].'" '.$accion.' >						
				'.CreaDestacatButton($row["Imatge"]).'
			</td>		
		</tr>';
	}
	
	
//	if (mysqli_real_escape_string($mysqli,$_GET["h"])=='1')	
//	{
//	$resultado = $resultado . '<tr><td height="10px"></td></tr>	';		
//	}
}

 


$resultado = $resultado . '<tr><td height="15px"></td></tr>';
//$resultado = $resultado . '<tr><td height="10px"></td></tr>';

if (mysqli_real_escape_string($mysqli,$_GET["h"])!='1')	
	{
		$resultado = $resultado . '<td></td>';
	}

//$resultado = $resultado . '<tr><td height="15px"></td></tr>';

$resultado = $resultado . '	
</table>';

echo $resultado;

function CreaDestacatButton($cadena)
{
	session_start;
	
	$c = explode("|",$cadena);

	if ($_SESSION["ButtonsColor"])
	{
		$color1 = "#".$_SESSION["ButtonsColor"];
		$color2 = "#FFFFFF";
	}
	else
	{
		$color1 = $c[0];
		$color2 = $c[1];
	} 


	return '

	<table cellspacing="0" cellpadding="0" border="0">
	  <tr valign="middle">
		  <td>
			  <div class="DestacatButton" style="width:198px;height:41px; background-color:'.$color1.'; border: solid 1px '.$color1.'; ">
				  <div style="width:100%;height:41px;background:URL(/img/MaskButton.png);">
					  <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
						  <tr valign="middle">
							  <td width="100%" height="100%" valign="middle" align="center">
								  <div class="DivTextButtonProva" style="color:'.$color2.';">'.$c[2].'</div>
							  </td>
						  </tr>
					  </table>
			  </div></div>
		  </td>
	  </tr>	
  </table> 
';	
}
?>
