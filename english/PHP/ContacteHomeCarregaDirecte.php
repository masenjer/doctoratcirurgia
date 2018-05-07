<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

ini_set("session.gc_maxlifetime",3);
session_start();

$permiso="";
$colsp=5;







$SQL = "SELECT * FROM Contacte WHERE  IdSite =".$_SESSION["IdSite"]." ";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 
while ($row = $result->fetch_assoc()){

	$accion = ' onClick="CarregaEnllacIntern(\''.$row["URL"].'\');"'; 
	 
	$resultado = $resultado . '
				';

	if ($_SESSION["Noticias"]=="1")
{	
	$resultado.= '
		<div class="row block-title">
			<div class="col-md-10">
				<h3 class="block-title" role="heading" aria-level="2">'.$row["Titol"].'</h3>
			</div>
			<div class="col-md-2">
				<h3><span class="glyphicon glyphicon-edit" aria-hidden="true" 	onClick="CarregaContacteEdicio()"></span></h3>
			</div>
		</div>
		';
	
	$colsp = 3;
}else{
	$resultado.= '
		<div class="row">
			<div class="col-md-12">
				<h3 class="block-title" role="heading" aria-level="2">'.$row["Titol"].'</h3>
			</div>
			
		</div>
		';
}		

	$resultado .= '
				<aside class="content-avisos">'.$row["Contingut"].'<br></aside>';

				/*
				<tr valign="middle">					
					<td height="20px" align="right" '.$accion.' class="InfoContacteHome"> Telèfons i horari	</td>					
				</tr>';
				*/
}




echo $resultado;
?>
