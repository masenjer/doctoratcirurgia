function MostraPublicacions()
{
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$("#ContingutPages").hide();
	$('#Directori').hide();
	
	$('#Publicacions').fadeIn(1000);
	
	MenuMDCarrega();
	
	$("#RadioCercaPublicacions").attr("checked", true);
	InicialitzaNouPublicacions();
	
	window.location.hash = "!/Publicacions";
}

function MostraNouPublicacions()
{
	$("#DIVNewPublicacions").show("slow");	
	InicialitzaNouPublicacions();
}

function TancaNouPublicacions()
{
	$("#DIVNewPublicacions").hide("slow");	
}

function InicialitzaNouPublicacions()
{
	$("#TipusNewPublicacions").val(0);	
	$("#AutorNewPublicacions").val("");
	$("#TitolNewPublicacions").val("");
	$("#AnyNewPublicacions").val("");
	$("#LiniesNewPublicacions").val("");
	$("#RevistaNewPublicacions").val("");

	$("#CercadorPublicacions").val("");
	
	PublicacionsCercador();
}

function AddNewPublicacions()
{
	var Tipus = $("#TipusNewPublicacions").val();
	var Autor = $("#AutorNewPublicacions").val();
	var Titol = $("#TitolNewPublicacions").val();
	var Any = $("#AnyNewPublicacions").val();
	var Linies = $("#LiniesNewPublicacions").val();
	var Revista = $("#RevistaNewPublicacions").val();

	$.post("PHP/Publicacions/PublicacionsAddNew.php",{Tipus:Tipus, Autor:Autor, Titol:Titol, Any:Any, Linies:Linies, Revista:Revista},LlegadaAddNewPublicacions);
}

function LlegadaAddNewPublicacions(data)
{	
	alert("Resgistre guardat a la base de dades");
	InicialitzaNouPublicacions();
	PublicacionsCercador();
}

function PublicacionsCercador()
{
	var tipus = $("[Name = RadioCercaPublicacions]:checked").val();
	var txt = $("#CercadorPublicacions").val();
	
	$.post("PHP/Publicacions/PublicacionsCercador.php",{tipus:tipus,txt:txt},LlegadaPublicacionsCercador);
}

function LlegadaPublicacionsCercador(data)
{
	if (data)
	{
		var cadena = data.split("|");
		$("#ResultatsPublicacions").html(cadena[0]);
		$("#ComptadorResultatsPublicacions").html(cadena[1]);
	}
	else
	{
		$("#ResultatsPublicacions").html("");
		$("#ComptadorResultatsPublicacions").html("");
	}
}

function PublicacionsUpdate(id)
{
	var Tipus = $("#TipusEditaPublicacions"+id).val();
	var Autor = $("#AutorEditaPublicacions"+id).val();
	var Titol = $("#TitolEditaPublicacions"+id).val();
	var Any = $("#AnyEditaPublicacions"+id).val();
	var Linies = $("#LiniesEditaPublicacions"+id).val();
	var Revista = $("#RevistaEditaPublicacions"+id).val();
	
	$.post("PHP/Publicacions/PublicacionsUpdate.php",{id:id, Tipus:Tipus, Autor:Autor, Titol:Titol, Any:Any, Linies:Linies, Revista:Revista},LlegadaPublicacionsUpdate);
}

function LlegadaPublicacionsUpdate(data)
{
	alert("Resgistre actualitzat");
	PublicacionsCercador();
}

function MostraPublicacionsDelete(id)
{
	document.getElementById("ButtonEliminaTOT").onclick = function(){PublicacionsDelete(id);}
	$("#DIVEliminaTOT").fadeIn("slow");
}

function PublicacionsDelete(id)
{
	$.post("PHP/Publicacions/PublicacionsDelete.php",{id:id},LlegadaPublicacionsDelete);
}

function LlegadaPublicacionsDelete(data)
{
	$("#DIVEliminaTOT").fadeOut("slow");
	alert("Registre eliminat correctament");
	PublicacionsCercador();
}