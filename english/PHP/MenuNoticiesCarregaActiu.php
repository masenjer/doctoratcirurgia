<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

$SQL = "SELECT IdNoticia, Titol, Rang FROM Noticias WHERE IdSite =".$_SESSION["IdSite"]." AND Rang is not NULL order by Rang ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$resultado = '
<table width="100%"  cellpadding="10" cellspacing="0" border="0" class="fuenteLinNoticia">';

 while ($row = $result->fetch_assoc())
{
	$resultado = $resultado . '
	<tr valign="middle">
		<td style="border-bottom:1px solid #aaa;">
			<input type="text" id="RangNoticia'.$row["IdNoticia"].'" value = "'.$row["Rang"].'" onKeyPress="submitenter(11,event,'.$row["IdNoticia"].')" style="width:15px;">
		</td>
		<td height="40px" id="MenuNoticias'.$row["IdNoticia"].'" onClick="CargaNoticias('.$row["IdNoticia"].')" align="left" style="border-bottom:1px solid #aaa;">						
			'.$row["Titol"].'
		</td>		
	</tr>';
}

 

$resultado = $resultado . '	
</table>';

echo $resultado;
?>
