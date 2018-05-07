<?php
function CarregaJSAdmin()
{
	if (($_SESSION["Edicio"]=="1")||($_SESSION["Usuarios"]=="1")||($_SESSION["Noticias"]=="1")||($_SESSION["Creacio"]=="1"))
	{
?>
    <script src="admin/JS/f.js" type="text/javascript"> </script>
    <script src="admin/JS/i.js" type="text/javascript"> </script>
<?php
	}
}
?>
