<?php
	function CarregaDadesProfile_JSON($id){


		
		session_start();
		
		include($_SERVER['DOCUMENT_ROOT']."/rao/rao_con.php");

		switch ($_SESSION["IdSite"]){
			case 0: $idioma = "_ca";
					break;
			case 1: $idioma = "_es";
					break;
			case 2: $idioma = "_en";
					break;					
		}

		
		$retorno = array();
		$datos = array("Nom","Cognoms","Despatx","Ubicacio","Telefon","Email","Imatge","IdDirectoriCategoria1","IdDirectoriCategoria2", "IdUnitatDocent1", "IdUnitatDocent2", "IdDirectori", "Carrec_ca", "Carrec_es", "Carrec_en", "Adreca", "Tesis","Horari", "Xarxes", "TitolDC1", "TitolDC2", "TitolUD1", "TitolUD2", "Especialitat_ca", "Especialitat_es", "Especialitat_en", "Tutor");
		
		$SQL = "SELECT D.*, Tutor, DC1.Titol".$idioma." as TitolDC1, DC2.Titol".$idioma." as TitolDC2, UD1.Titol".$idioma." as TitolUD1, UD2.Titol".$idioma." as TitolUD2 FROM Directori D 
				LEFT JOIN DirectoriCategoria DC1 
				ON DC1.IdDirectoriCategoria = D.IdDirectoriCategoria1 
				LEFT JOIN DirectoriCategoria DC2 
				ON DC2.IdDirectoriCategoria = D.IdDirectoriCategoria2 
				LEFT JOIN UnitatDocent UD1 
				ON UD1.IdUnitatDocent= D.IdUnitatDocent1 
				LEFT JOIN UnitatDocent UD2 
				ON UD2.IdUnitatDocent= D.IdUnitatDocent2 				 
				WHERE IdDirectori = ".$id;

		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));
	
		while ($row = $result->fetch_assoc()){ 
			foreach ($datos as $v){
				$retorno[$v] =$row[$v];	
			}
		}
		
		return json_encode($retorno);
		
	}
?>