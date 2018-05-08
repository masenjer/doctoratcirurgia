<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
session_start();

$SQL = "SELECT IdNoticia, Titol FROM Noticias WHERE IdSite =".$_SESSION["IdSite"]." order by IdNoticia DESC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


$resultado = '
<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="fuenteLinNoticia">';

 while ($row = $result->fetch_assoc())
{
	$resultado = $resultado . '
	<tr valign="middle">
		<td height="40px" id="MenuNoticias'.$row["IdNoticia"].'" onClick="CargaNoticias('.$row["IdNoticia"].')" background="/img/LinHistoricoNoticias.png" align="center">						
			'.$row["Titol"].'
		</td>		
	</tr>';
}

 

$resultado = $resultado . '	
</table>';

echo $resultado;
?>
