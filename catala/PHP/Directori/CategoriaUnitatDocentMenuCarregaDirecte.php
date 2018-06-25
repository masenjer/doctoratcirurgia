<?php



error_reporting (5); 
include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php"); 

ini_set('session.cache_expire',3);
ini_set("session.gc_maxlifetime",3);
session_start();

switch ($_SESSION["IdSite"]){
	case 0: $idioma = "_ca";
			break;
	case 1: $idioma = "_es";
			break;
	case 2: $idioma = "_en";
			break;					
}


$idCap = mysqli_real_escape_string($mysqli,$_GET["n"]);

$sub = false;

$SQL = "SELECT * FROM UnitatDocent order by Orden";
if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));


echo '

<div class=" menu-left">
	<div class="navbar">



  	<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed ico" data-toggle="collapse" data-target="#navbar-sidebar" aria-expanded="false" aria-controls="navbar">
	    <span class="ico hamburguer" aria-hidden="true"></span>
        <span class="sr-only">Prem per desplegar el menú de  null</span>
      </button>
      
	  
			
	  	  
    <span class="visible-xs navbar-brand">Unitats Docents</span>
    </div>


<nav id="navbar-sidebar" class="navbar-collapse collapse sidebar-navbar-collapse" role="navigation">
    	<nav id="nav-context" class="menu-content" role="navigation" aria-label="Menú principal"><!-- UAB2013/Responsive_WD/Common/CSElementDisplayLeftMenu_RWD 8-->

			<div class="aside-nav-content">
			    <div role="tab" id="id_1" class="title">
					<a aria-controls="collapseUD" aria-expanded="true" href="#collapseUD" data-parent="#accordion" data-toggle="collapse" role="button">
						Unitats Docents
						<span class="ico down" aria-hidden="true"></span>
				    </a>
				
				</div>
					<div id="collapseUD" class="collapse in" role="tabpanel" aria-labelledby="id_1">
						<ul>
						<li  class="no-sub">
							<a href = "directori.php" >
								Tots els registres
							</a>
						</li>

';

while ($row = $result->fetch_assoc())
	{
		if ($_SESSION["Creacio"]=="1")
		{
			$accion = '

				<div class="row eines">
					<div class="col-md-3"></div>
					
					<div class="col-md-3">	
						<h3>
							<span class="glyphicon glyphicon-edit " aria-hidden="true" 	onClick="EditaTitolCategoriaUnitatDocent('.$row["IdUnitatDocent"].')"></span>
						</h3>		
					</div>
					<div class="col-md-3">	
						<h3>
							<span class="glyphicon  glyphicon-remove-sign " aria-hidden="true" 	onClick="MostraEliminaTOT(14,event,'.$row["IdUnitatDocent"].');"></span>
						</h3>		
					</div>
					
					<div class="col-md-3">	<input class="OrdenML" type="text" id="OrdenCategoriaUnitatDocent'.$row["IdUnitatDocent"].'" value="'.$row["Orden"].'"  onKeyPress="submitenter(15,event,'.$row["IdUnitatDocent"].')"></td>
					</div>
				</div>
		
				<input type="hidden" id="tdCategoriaUnitatDocentAntic'.$row["IdUnitatDocent"].'" value="'.$row["Titol".$idioma].'">
				<input type="hidden" id="tdCategoriaUnitatDocenthrefAntic'.$row["IdUnitatDocent"].'" value="'.$row["Titol".$idioma].'_'.$row["IdUnitatDocent"].'">
			';
		}



		
		echo  '  
			<li  class="no-sub">
				<a id ="href_ud_'.$row["IdUnitatDocent"].'" href = "directori.php?UD='.$row["IdUnitatDocent"].'" >
					<div id="tdCategoriaUnitatDocent'.$row["IdUnitatDocent"].'"><div id="DIVTitolCategoriaUnitatDocent'.$row["IdUnitatDocent"].'"style="text-decoration:none;">'.$row["Titol".$idioma].'</div></div>
				</a>'.$accion.'
			</li>';

				

			

	}
 

	


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
				<h2><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" onClick="NovaCategoriaUnitatDocent()"></span>
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




