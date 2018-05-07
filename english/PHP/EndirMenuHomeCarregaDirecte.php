<?php

include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
//include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 



ini_set("session.gc_maxlifetime",3);
ini_set('session.cache_expire',3);
session_start();

$permiso="";
$colsp = 5;

echo '<h2 class="section-title" aria-level="2" role="heading">
        Enllaços directes &nbsp;';

if ($_SESSION["Noticias"]=="1")
{	
	echo  '<span class="glyphicon glyphicon-edit" aria-hidden="true" onClick="AbreGestorEnDir()"></span>';
	
}

echo '</h2>';

$SQL = "SELECT * FROM EnDirHome WHERE  IdSite =".$_SESSION["IdSite"]."  order by Orden ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


echo '<ul class="fitxa-llistat">';

 while ($row = $result->fetch_assoc())
{
	$target = "";
	
	if ($row["TipusEnllac"] == 1)
	{
		$accion = ' href="javascript:void(0);"  onClick=" CarregaEnllacIntern(\''.$row["URL"].'\');"';  
	}else
	{
		if ($row["TipusEnllac"] == 2) 
		{
			$accion = ' href = "'.$row["URL"].'" '; 			
		}
		else {
			$accion = ' href = "Documents/'.$row["URL"].'" ';
			$target = "_blank";
		}
	}
	
	echo '
	<li>
		<a '.$accion.' target="'.$target.'">'.$row["Titol"].'<span class="ico more" aria-hidden="true"></span></a>
	</li>';
}

 

echo '
	
</ul>';


?>
