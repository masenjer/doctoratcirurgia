<?php
function MostraDirectoriPublic($txt, $idC, $idUD)
{	
	header('Content-type: text/html; charset=utf-8');

	session_start();
	include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");
	
	$idCategoriaActual = 'inicializa';
	
	switch ($_SESSION["IdSite"]){
		case 0: $idioma = "_ca";
				break;
		case 1: $idioma = "_es";
				break;
		case 2: $idioma = "_en";
				break;					
	}
	
	if ($txt)
	{	
		foreach ($txt as $v)
		{
			if ($cond) $cond.=" AND ";
			
			$cond .= " (Nom LIKE '%".$v."%' OR Cognoms LIKE '%".$v."%' OR Despatx LIKE '%".$v."%' OR Ubicacio LIKE '%".$v."%' OR Telefon LIKE '%".$v."%' OR Email LIKE '%".$v."%')";
		}
	}

	if ($idC){
		if ($cond) $cond.=" AND ";
		$cond .= " (IdDirectoriCategoria1 = ".$idC." OR IdDirectoriCategoria2 = ".$idC.") ";
	}
	
	if ($idUD){
		if ($cond) $cond.=" AND ";
		$cond .= " (IdUnitatDocent1 = ".$idUD." OR IdUnitatDocent2 = ".$idUD.") ";
	}
	
	$SQL = "SELECT D.*, DC.Titol".$idioma.", D.Tutor, DC.IdDirectoriCategoria, UD1.Titol".$idioma." as TUD1, UD2.Titol".$idioma." as TUD2 FROM Directori D 
			LEFT JOIN DirectoriCategoria DC 
			ON (DC.IdDirectoriCategoria = D.IdDirectoriCategoria1 OR  DC.IdDirectoriCategoria = D.IdDirectoriCategoria2) 
			LEFT JOIN UnitatDocent UD1 
			ON UD1.IdUnitatDocent = D.IdUnitatDocent1 
			LEFT JOIN UnitatDocent UD2 
			ON UD2.IdUnitatDocent = D.IdUnitatDocent2 
			";
	
	if ($cond) $SQL .= " WHERE ".$cond."";
	
	$SQL .= " ORDER BY DC.Orden, D.Cognoms, D.Nom ASC ";
	
	
	
	$i = 0;
	
	//$resFin .= $SQL;
	
	if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli)); 


	
	 while ($row = $result->fetch_assoc())
	{


		if (!$idC || $idC == $row["IdDirectoriCategoria"]){
			
	
			if ($idCategoriaActual != $row["IdDirectoriCategoria"]){
				
				$resFin .= '
			<p class="TitolCategoria">'.$row["Titol".$idioma].'</p>';
				$idCategoriaActual = $row["IdDirectoriCategoria"];
			}

			if ($row["Perfil"]||$row["Inves"]||$row["Publi"]){
				$nom = '<a href="profile.php?id='.$row["IdDirectori"].'" class="NomLlistatDirectori">'.$row["Nom"].' '.$row["Cognoms"].'</a>';
				$info = '<tr><td colspan="2"><a href="profile.php?id='.$row["IdDirectori"].'" class="InfoLlistatDirectori">+ Informaci&oacute;</a></td></tr>';	
			}
			else {
				$nom = '<span class="NomLlistatDirectori">'.$row["Nom"].' '.$row["Cognoms"].'</span>';	
				$info = '';	
			}
			
			if ($row["Imatge"]) $IMG = '<img class="IMGFitxaDirectoriLlistat" src="../IMGDirectori/'.$row["Imatge"].'" style="width:100px;" alt="'.$row["Nom"].' '.$row["Cognoms"].'" title="'.$row["Nom"].' '.$row["Cognoms"].'">';
			else $IMG = "";
			
			if ($row["TUD2"]){
				$UD = $row["TUD1"]."</br>".$row["TUD2"];
			}else{
				$UD = $row["TUD1"];	
			}		
			

			$tutor_class = (!$row["Tutor"])?"tutor":""; 
			
			
			$resFin .= '
			<div class="col-md-4 '.$tutor_class.'">

				<div class="card">
					<div class="subcard">
					  '.$IMG.'
					  <h1>'.$nom.'</h1>
					  <p class="title">'.$row["Carrec".$idioma].'</p>
					  <p>'.$row["Especialitat".$idioma].'</p>
					  <p>'.$UD.'</p>
					  <p><a href="mailto:'.$row["Email"].'">'.$row["Email"].'</a></p>
					</div>	  
				  <p><a href="profile.php?id='.$row["IdDirectori"].'"><button>+ Info</button></a></p>
				</div>
			</div>
			';
		}

		$i++;
		//PAra evitar espacios en blanco
		if ($i==3){
			$resFin .= '<div class="clearfix tutor"></div>'; 
			$i=0;
		}

		

	}


	$resFin .='
		|';
	
	$num_filas =$result->num_rows;
	
	$resFin .= ComptadorResultatsDirectori($num_filas);


	
	return ($resFin);
}
?>