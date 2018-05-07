<?php
	if ($_SESSION["WebColor"])
	{
	?>	
	<script>
    	$(".fuenteTitolML").css("color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".fuenteTitolContingut").css("color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".TitolHome").css("background-color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".TitolHome").css("border-color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".fuenteTitolMD").css("background-color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".fuenteTitolMD").css("border-color","#<?php echo $_SESSION["WebColor"] ?>");		
		$(".TitolMapaWeb").css("background-color","#<?php echo $_SESSION["WebColor"] ?>");	
		$(".TitolMapaWeb").css("border-color","#<?php echo $_SESSION["WebColor"] ?>");	
			
		$("#FondoSelectorColorWeb").css("background-color","#<?php echo $_SESSION["WebColor"] ?>");	
		$("#InfoColorWeb").html("color: #<?php echo $_SESSION["WebColor"] ?>");
	</script>	
	<?php
    }
?>
