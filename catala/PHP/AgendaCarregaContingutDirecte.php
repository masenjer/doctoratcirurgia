<?php

include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 
//include($_SERVER['DOCUMENT_ROOT']."/rao/PonQuita.php"); 



ini_set("session.gc_maxlifetime",3);
ini_set('session.cache_expire',3);
session_start();

$permiso="";
$colsp = 5;



if ($_SESSION["Noticias"]=="1")
{	
	echo  '<span class="glyphicon glyphicon-edit" aria-hidden="true" onClick="AbreGestorAgenda()"></span>';
	
}

echo '<h2 class="section-title" aria-level="2" role="heading">
	
	Agenda
	
</h2>';




$SQL = "SELECT *,  DATE_FORMAT(Hora, '%k:%i') as Hora FROM Agenda WHERE  IdSite =".$_SESSION["IdSite"]."  order by Fecha, Hora ASC";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


 while ($row = $result->fetch_assoc())
{
	$dia = date("d", strtotime($row["Fecha"]));
	$mes = date("M", strtotime($row["Fecha"]));

	$enllac =($row["Enllac"])?$row["Enllac"]:"javascript:void(0);" ;


	echo '
		<article class="event" itemscope="" itemtype="http://schema.org/Event">
		     
		    <div class="data" itemprop="startDate" content="'.$row["Fecha"].'T'.$row["Hora"].'">
		        <a href="'.$enllac.'"> 
		            <p class="mes">
		                '.$mes.' 
		            </p>
		            <p class="dia">
		                '.$dia.' 
		            </p>
		        </a> 
		    </div>
		    <div class="hora-lloc">
		    <p>
		        '.$row["Hora"].' h <br>
		        
		            <span itemprop="location" itemscope="" itemtype="http://schema.org/Place">
		                <span itemprop="name">'.$row["Ubicacio"].'</span> 
		                <span class="sr-only" itemprop="address">'.$row["Ubicacio"].'</span>
		            </span>
		            
		    </p>
		    </div>
		     
		    <div class="jornada">
		    
		        <h3 role="heading" aria-level="3">
		            <a href="'.$enllac.'1" itemprop="url">
		                <span itemprop="name">'.$row["Descripcio"].'</span>
		            </a> 
		        </h3>
		    
		    </div>
		</article> 

	';
	
	
}

 


?>
