<?php
	function CarregaDadesProfile_JSON($id,$Conn){
		include ($Conn);
		
		$retorno = array();
		$datos = array("Nom","Cognoms","Despatx","Ubicacio","Telefon","Email","Imatge","IdDirectoriCategoria1","IdDirectoriCategoria2","IdDirectori", "Carrec", "Adreca", "Xarxes");
		
		$SQL = "SELECT * FROM Directori WHERE IdDirectori = ".$id;
		if (!$result = $mysqli->query($SQL))printf("Errormessage: %s\n", mysqli_error($mysqli));

		
		 while ($row = $result->fetch_assoc()){ 
			foreach ($datos as $v){
				$retorno[$v] =$row[$v];	
			}
		}
		
		return json_encode($retorno);
		
	}
?>