<?php
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 
include("PHP/Fechas.php");

session_start();


	/*echo '<div class="col-md-12">
		<h2 class="section-title" aria-level="2" role="heading"> Notícies ';*/
  echo '<div class="row">';  

	
	if ($_SESSION["Noticias"]=="1")
	{	
		echo '<span class="glyphicon glyphicon-edit" aria-hidden="true" 	onClick="AbreGestorNoticias()"></span>';
	}

	//echo '</h2></div>';
	


$today = trim(date("Y-m-d"));

//$SQL = "SELECT * FROM Noticias WHERE FechaPub <= '$today' and FechaDesPub > '$today' ORDER BY IdNoticia DESC";

$primera = true;

$SQL = "SELECT * FROM Noticias WHERE Rang is not NULL AND IdSite = ".$_SESSION["IdSite"]." ORDER BY Rang ASC ";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
//	if (CompruebaSiPublicado($row["FechaPub"],$row["FechaDesPub"]) == 1)
//	{
	if ($row["NOU"] == "1") $NOU = '<img src="/img/NOU.gif" style="padding-left:10px" />';
	else $NOU = "";
	if ($primera){
		$resultado = $resultado . '
	<div class="col-sm-12 col-md-12">';
	}else{
		$resultado = $resultado . '
	<div class="col-sm-12 col-md-6">';
	}

	$resultado = $resultado . '
	
		<article class="post">
			'//<h3>'.Quita($row["Titol"]).'</h3>
			.Quita($row["Cos"]).'
		</article>
	</div>';	
//	}

	$primera = false;
}

 
/*
$resultado .= '
<div class="col-sm-12">
	<a role="button" class="view-more" href="News.php">Totes les notícies</a>
</div>
';

*/


echo $resultado;
echo '</div>';
?>

<?php
function CompruebaSiPublicado($P,$D)
{
	$dia = date("d");
	$mes = date("m");
	$ano = date("Y");
	
	$dp = substr($P,0,2);
	$dd = substr($D,0,2);
	
	$mp = substr($P,3,2);
	$md = substr($D,3,2);
	
	$ap = substr($P,6,4);
	$ad = substr($D,6,4);
	
	if(($ano >= $ap )&&($ano <= $ad))
	{
		if(($mes >= $mp )&&($mes <= $md))
		{
			if(($dia >= $dp )&&($dia <= $dd))
			{
				return 1;
			}
		}
	}
	
	return 0;
}
?>