
function MenuPaginesOcultesCarrega(n)
{
	$.get("PHP/MenuPaginesOcultesCarrega.php",{n:n},LlegadaMenuPaginesOcultesCarrega);
}

function LlegadaMenuPaginesOcultesCarrega(data) 
{
	$('#VideoEnFicha').html("");
	$('#MPaginesOcultes').html("");	
	$('#MPaginesOcultes').html(data);
	CanviaColorWeb($("#VARColorWeb").val());	 
}

function MostraVinclePaginaOculta(id) ///Mostrala pàgina oculta
{	
	var position = $("#DIVTitolLPage"+id).position();
		
	$("#DIVVinclePaginaOculta"+id).show("slow");
	$("#DIVVinclePaginaOculta"+id).css("top", position.top);
	$("#DIVVinclePaginaOculta"+id).css("left", position.left);	 
}

function AmagaVinclePaginaOculta(id)
{
	$("#DIVVinclePaginaOculta"+id).hide("slow");
}