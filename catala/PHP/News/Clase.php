<?php 

class News {	
	public $Conexion;
	private $SearchText, $SearchDesde, $SearchHasta;
	
	function CargaListadoNews($ST, $SD, $SH, $idN){
		session_start();
		include ($this->Conexion);
		
		$this->SearchText  = $ST;
		$this->SearchDesde = $SD;
		$this->SearchHasta = $SH; 
		
		$_SESSION["SearchText"]  = $ST;
		$_SESSION["SearchDesde"] = $SD;
		$_SESSION["SearchHasta"] = $SH;
		
		$SQL = "SELECT IdNoticia, Titol, DATE_FORMAT(FechaNot,'%d/%m/%Y')  as Fecha FROM Noticias ";
		
		if ($this->SearchText) 
			$Cond .= " AND (Titol LIKE '%".$this->SearchText."%' OR Cos LIKE '%".$this->SearchText."%') ";
		if ($this->SearchDesde)
			$Cond .= " AND FechaNot >= '".$this->SearchDesde."'";			
		if ($this->SearchHasta)
			$Cond .= " AND FechaNot <= '".$this->SearchHasta."'";
			
		$WHERE = " WHERE IdSite = ".$_SESSION["IdSite"];
		$ORDER = " ORDER BY FechaNot DESC";
		$SQL .= $WHERE . $Cond. $ORDER;
		
		if(!$result = mysql_query($SQL,$oConn)) die (mysql_error($oConn)) ;		
				
		 while ($row = $result->fetch_assoc()){
			echo $entro;
			if ($idN == $row["IdNoticia"]) $Style = "NewsLlistat_SEL";
			else $Style = "NewsLlistat";
			
			$resultado .= '
				<a href="News.php?Noticia='.$row["IdNoticia"].'">
				<div id="DIVLlistatNoticies'.$row["IdNoticia"].'" class="TextDossierNoticies '.$Style.'">
					<span class="NewsLlistatFecha">['.$row["Fecha"].']</span>&nbsp;-&nbsp;'.$row["Titol"].'
				</div>
				</a>';			
		}		
		return $resultado;
	}
	
	function Carga($idN){
		session_start();
		include ($this->Conexion);
		
		$SQL = "SELECT * FROM Noticias WHERE IdNoticia = ".$idN." AND IdSite = ".$_SESSION["IdSite"];
		if(!$result = mysql_query($SQL,$oConn)) die (mysql_error($oConn)) ;		

		 while ($row = $result->fetch_assoc()){
			return '
				<div class="TitolTextDossierNoticies">'.$row["Titol"].'</div>
				<div class="TextDossierNoticies">'.$row["Cos"].'</div>
			';
		}		
	}
	

}
?>