<?php
function CompruebaPermisosEdicion()
{
	if ($_SESSION["Edicio"]=="1")
	{
?>
		<script>
			$('#ButtonEditContingut').show();
			$('#ButtonAddDirectori').show();
			$('#ButtonAddPublicacions').show();
        </script>
<?php
	}
}
?>
