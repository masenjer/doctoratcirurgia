function MostraMenuColor()
{
	$("#MenuColor").fadeIn("slow");
}


function CanviaColorWeb(color)
{
	if (color)
	{
		$(".fuenteTitolML").css("color","#"+color);	
		$(".fuenteTitolContingut").css("color","#"+color);	
		$(".TitolHome").css("background-color","#"+color);	
		$(".TitolHome").css("border-color","#"+color);	
		$(".fuenteTitolMD").css("background-color","#"+color);	
		$(".fuenteTitolMD").css("border-color","#"+color);		
		$(".TitolMapaWeb").css("background-color","#"+color);	
		$(".TitolMapaWeb").css("border-color","#"+color);	
		$(".RutaCercador").css("color","#"+color);	
			
		$("#FondoSelectorColorWeb").css("background-color","#"+color);	
		$("#InfoColorWeb").html("color: #"+color);
	}
}

function SaveColorWeb()
{
	var color = $("#VARColorWeb").val();
	$.get("PHP/WebColorUpdate.php",{color:color},LlegadaSaveColorWeb);	
}

function EliminaColorWeb()
{
	$.get("PHP/WebColorDelete.php",{},LlegadaSaveColorWeb);	
}

function LlegadaSaveColorWeb(data)
{
	if (data)alert("El nou color de la seva web es el #" + data);	
	else location.reload(true);
}

function CanviaColorButtons(color)
{
	if (color)
	{
		$(".DivTextButtonProva").css("color","#ffffff");	
		$(".DestacatButton").css("background-color","#"+color);	
		$(".DestacatButton").css("border-color","#"+color);	
			
		$("#FondoSelectorColorButtons").css("background-color","#"+color);	
		$("#InfoColorButtons").html("color: #"+color);
	}
}

function SaveColorButtons()
{
	var color = $("#VARColorButtons").val();
	$.get("PHP/ColorButtonsSave.php",{color:color},LlegadaSaveColorButtons);	
}

function EliminaColorButtons()
{
	$.get("PHP/ColorButtonsDelete.php",{},LlegadaSaveColorWeb);	
}

function LlegadaSaveColorButtons(data)
{
	alert("El nou color dels botons la seva web es el #" + data);	
}

function CarregaColorsWeb()
{
	$.get("PHP/WebColorsCarrega.php",{},LlegadaCarregaColorsWeb);	
}

function LlegadaCarregaColorsWeb(data)
{
	var cadena = data.split("|");
	
	$("#VARColorWeb").val(cadena[0]);
	
	$("#VARColorButtons").val(cadena[1]);
	
	CanviaColorWeb(cadena[0]);
}