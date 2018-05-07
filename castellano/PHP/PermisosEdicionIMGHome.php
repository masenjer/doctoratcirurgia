<?php
function CompruebaPermisosEdicionIMGHome()
{
	if ($_SESSION["Noticias"]=="1")
	{
?>
		<script>
			$('#DIVEditIMGHome').show();
			$('#DIVIMGHome1').hide();
			$('#DIVIMGHome2').hide();
			
			CarregaLlistatGestioIMGhome();
        </script>
<?php
	}
	else
	{
?>
		<script>
			$('#DIVEditIMGHome').hide();
			$('#DIVIMGHome1').show();
			$('#DIVIMGHome2').show();
			
			CarregaLlistatImatgesHome();
        </script>
<?php
	}
}
?>
