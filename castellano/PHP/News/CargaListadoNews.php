<?php 

class News {
	public $Conexion;
	private $SearchText, $SearchDesde, $SearchHasta;
	
	function CargaListadoNews($ST, $SD, $SH){
		include ($this->Conexion);
		
		$this->SearchText  = $ST;
		$this->SearchDesde = $SD;
		$this->SearchHasta = $SH; 
		
		$SQL = "SELECT * FROM Noticies ";
		
		if ($this->SearchText) 
			$Cond .= " (Titol LIKE '%".$this->SearchText."%' OR Cos LIKE '%".$this->SearchText."%') ";
		if ($this->SearchDesde)
			$Cond .= " FechaNot >= '".$this->SearchDesde."'";			
		if ($this->SearchHasta)
			$Cond .= " FechaNot <= '".$this->SearchHasta."'";
			
		if ($Cond) $WHERE = " WHERE ";
		
		$SQL .= $WHERE . $Cond;
		
		if(!$result = mysql_query($SQL,$oConn)) die (mysql_error($oConn)) ;		
		
		 while ($row = $result->fetch_assoc()){
			$resultado = '
				<div id="DIVLlistatNoticies" class="NewsLlistat">
					'.$row["Titol"].'
				</div>';			
		}		
	}
	
	
}
?>