<?php



error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

ini_set('session.cache_expire',3);
ini_set("session.gc_maxlifetime",3);
session_start();

$idCap = mysqli_real_escape_string($mysqli,$_GET["n"]);

$sub = false;

$SQL = "SELECT Titol FROM CapMenu WHERE IdSite =".$_SESSION["IdSite"]." AND IdCapMenu = ".$idCap;
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

 while ($row = $result->fetch_assoc())
{
	$TitolCap = $row["Titol"];
}



echo '

<div class="sidebar menu-left">
		<div class="navbar">



  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed ico" data-toggle="collapse" data-target="#navbar-sidebar" aria-expanded="false" aria-controls="navbar">
	    <span class="ico hamburguer" aria-hidden="true"></span>
        <span class="sr-only">Prem per desplegar el menú de  null</span>
      </button>
      
	  
			
	  	  
    <span class="visible-xs navbar-brand">'.$TitolCap.'</span>
    </div>


<nav id="navbar-sidebar" class="navbar-collapse collapse sidebar-navbar-collapse" role="navigation">
    	<nav id="nav-context" class="menu-content" role="navigation" aria-label="Menú principal"><!-- UAB2013/Responsive_WD/Common/CSElementDisplayLeftMenu_RWD 8-->

			<div class="aside-nav-content">
			    <div role="tab" id="id_1" class="title">
					<a aria-controls="collapseC0" aria-expanded="true" href="#collapseC0" data-parent="#accordion" data-toggle="collapse" role="button">
						'.$TitolCap.'
						<span class="ico down" aria-hidden="true"></span>
				    </a>
				
				</div>
					<div id="collapseC0" class="collapse in" role="tabpanel" aria-labelledby="id_1">
						<ul>

';

echo LinMenuRecursivo($idCap,0);

 

	


if ($sub){
			echo '</ul></li>';
		}

echo '					</ul>';
if ($_SESSION["Creacio"]=="1")
{

	
	echo 
	'	
		<ul class>
			<li class="text-center">
				<h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onClick="NovaLPage('.$idCap.',0)"></span>
</h2>
				
			</li>
		</ul>';
		
}
echo '

					</div>
				</div>
			</nav>	   
	</nav>
	</div>
	</div>';




function LinMenuRecursivo($idCap,$idRel){
	
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

	$resultado = false;

	$SQL = "SELECT * FROM LinMenu WHERE IdSite =".$_SESSION["IdSite"]." AND IdCapMenu = ".$idCap." AND IdLinMenuRel = ".$idRel." AND Tipus = 1  order by orden";

	//if ($idRel !== 0) echo $SQL;
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));
	

	 while ($row = $result->fetch_assoc())
	{
		if ($_SESSION["Creacio"]=="1")
		{
			$accion = '

				<div class="row eines">
					<div class="col-md-3">	
						<h3>
							<span class="glyphicon glyphicon-plus-sign " aria-hidden="true" 	onClick="NovaLPage('.$idCap.','.$row["IdLinMenu"].')"></span>
						</h3>		
					</div>
					<div class="col-md-3">	
						<h3>
							<span class="glyphicon glyphicon-edit " aria-hidden="true" 	onClick="EditaTitolLPage('.$row["IdLinMenu"].')"></span>
						</h3>		
					</div>
					<div class="col-md-3">	
						<h3>
							<span class="glyphicon  glyphicon-remove-sign " aria-hidden="true" 	onClick="MostraEliminaTOT(1,'.$idCap.','.$row["IdLinMenu"].');"></span>
						</h3>		
					</div>
					
					<div class="col-md-3">	<input class="OrdenML" type="text"  id="OrdenME'.$row["IdLinMenu"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(5,event,'.$row["IdLinMenu"].');" >
					</div>
				</div>
		
				<input type="hidden" id="tdMEAntic'.$row["IdLinMenu"].'" value="'.$row["Titol"].'">
				<input type="hidden" id="tdMEhrefAntic'.$row["IdLinMenu"].'" value="'.$row["Titol"].'_'.$row["IdLinMenu"].'_1">
			';
		}



		//Compruebo si tiene hijos
		$data = LinMenuRecursivo($idCap, $row["IdLinMenu"]);	

		
		if ($data){ //Tiene hijos
			$resultado .= '
				<li class="sub">
			
				<a href="#collapse'.$row["IdLinMenu"].'_deep" data-toggle="collapse" data-parent="#collapse'.$idRel.'_deep" aria-expanded="false" class="collapsed">
					<div id="tdME'.$row["IdLinMenu"].'" onclick="MostraPage('.$row["IdLinMenu"].',1);">
					
						<div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div>
					
					</div> 
					<span class="ico mes"></span></a> '.$accion.'
					
					<ul id="collapse'.$row["IdLinMenu"].'_deep" class="collapse" style="height: 0px;" aria-expanded="false"> 
						
						'.$data.'
					</ul>
				</li>

				
		';

		//row["IdLinMenu"]

		



		}else{
			$resultado .= '  
				<li  class="no-sub">
					<a href = "javascript:void(0);" onclick="MostraPage('.$row["IdLinMenu"].',1);">
						<div id="tdME'.$row["IdLinMenu"].'"><div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div></div>
					</a>'.$accion.'
				</li>';

				/*
				Con href a ruta

				$resultado .= '  
				<li  class="no-sub">
					<a href = "index.php#!/'.$row["Titol"].'_'.$row["IdLinMenu"].'_1">
						<div id="tdME'.$row["IdLinMenu"].'"><div id="DIVTitolLPage'.$row["IdLinMenu"].'">'.$row["Titol"].'</div></div>
					</a>'.$accion.'
				</li>';


				*/

		}	

	}

	return $resultado;
}
?>

<script>
	function Redirect(URL){
		//alert(URL);
		MostraPage(id);
	}
</script>

