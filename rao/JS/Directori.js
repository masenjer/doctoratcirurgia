function MostraDirectori()
{
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$("#ContingutPages").hide();
	$('#Publicacions').hide();
	
	$('#Directori').fadeIn(1000);
	
	MenuMDCarrega();	
	InicialitzaNouDirectori();
	
	//window.location.hash = "!/Directori";
}

function MostraNouDirectori()
{
	$("#DIVNewDirectori").show("slow");	
	InicialitzaNouDirectori();
}

function TancaNouDirectori()
{
	$("#DIVNewDirectori").hide("slow");	
}

function InicialitzaNouDirectori()
{
	$("#NomNewDirectori").val("");
	$("#CognomsNewDirectori").val("");
	$("#DespatxNewDirectori").val("");
	$("#UbicacioNewDirectori").val("");
	$("#TelefonNewDirectori").val("");
	$("#EmailNewDirectori").val("");

	$("#ImatgeNewDirectori").val("");
	
	$("#CercadorDirectori").val("");
	DirectoriCercador();
}

function AddNewDirectori()
{
	var IMG = $("#ImatgeNewDirectori").val();
	IMG = IMG.split('\\');
	IMG = IMG[IMG.length-1];
	
	var n = $("#NomNewDirectori").val();
	var c = $("#CognomsNewDirectori").val();
	var d = $("#DespatxNewDirectori").val();
	var u = $("#UbicacioNewDirectori").val();
	var t = $("#TelefonNewDirectori").val();
	var e = $("#EmailNewDirectori").val();
	var cat1 = $("#Categoria1NewDirectori").val();
	var cat2 = $("#Categoria2NewDirectori").val();
	
	if (!cat1 && !cat2){
		alert("Has de seleccionar com a mínim una categoria per aquesta persona");
		return false;
	}else{
	$.post("PHP/Directori/DirectoriAddNew.php",{n:n, c:c, d:d, u:u, t:t, e:e, cat1:cat1, cat2:cat2, IMG:IMG},LlegadaAddNewDirectori);
	}
}

function LlegadaAddNewDirectori(data)
{
	var cadena = data.split("|");
	
	if (cadena[1])
	{
		$("#FormPujaNewIMGDirectori").attr("action","PHP/Directori/DirectoriUploadFiles.php?nom="+cadena[0]+cadena[1]+"&id=no");
		$("#FormPujaNewIMGDirectori").submit();	
	}
	alert("Resgistre guardat a la base de dades");
	InicialitzaNouDirectori();
	DirectoriCercador();
}

function DirectoriCercador()
{
	var txt = $("#CercadorDirectori").val();
	$.post("PHP/Directori/DirectoriCercador.php",{txt:txt},LlegadaDirectoriCercador);
}

function LlegadaDirectoriCercador(data)
{
	//alert(data);
	if (data)
	{
		var cadena = data.split("|");
		$("#ResultatsDirectori").html(cadena[0]);
		$("#ComptadorResultatsDirectori").html(cadena[1]);		
	}else
	{
		$("#ResultatsDirectori").html("");
		$("#ComptadorResultatsDirectori").html("");		
	}
}

function DirectoriUpdate(id)
{
	var IMG = $("#ImatgeEditaDirectori"+id).val();
	if (IMG) {
		IMG = IMG.split('\\');
		IMG = IMG[IMG.length-1];
	}
	
	
	var n = $("#NomEditaDirectori"+id).val();
	var c = $("#CognomsEditaDirectori"+id).val();
	var d = $("#DespatxEditaDirectori"+id).val();
	var u = $("#UbicacioEditaDirectori"+id).val();
	var t = $("#TelefonEditaDirectori"+id).val();
	var e = $("#EmailEditaDirectori"+id).val();
	var cat1 = $("#Categoria1EditaDirectori"+id).val();
	var cat2 = $("#Categoria2EditaDirectori"+id).val();
	var Carrec = $("#CarrecEditaDirectori"+id).val();
	var Adreca = $("#AdrecaEditaDirectori"+id).val();
	var Xarxes = $("#XarxesEditaDirectori"+id).val();
	
//	if (!cat){
//		alert("Has d'indicar la categoria a la que pertany aquesta persona");
//		return false;	
//	}


	//alert(id);
	id +="_";
	if (cadena = id.split("_")) id = cadena[0];
	
	if (!cat1 && !cat2){
		alert("Has de seleccionar com a mínim una categoria per aquesta persona");
		return false;
	}else{
		$.post("PHP/Directori/DirectoriUpdate.php",{id:id, n:n, c:c, d:d, u:u, t:t, e:e, cat1:cat1, cat2:cat2, Carrec:Carrec, Adreca:Adreca, Xarxes: Xarxes, IMG:IMG},LlegadaDirectoriUpdate);
		}
}

function LlegadaDirectoriUpdate(data)
{
	//alert(data);
	var cadena = data.split("|");
	
	if (cadena[1])
	{
		$("#FormPujaEditaIMGDirectori"+cadena[0]).attr("action","PHP/Directori/DirectoriUploadFiles.php?nom="+cadena[0]+cadena[1]+"&id="+cadena[0]);
		$("#FormPujaEditaIMGDirectori"+cadena[0]).submit();	
	}
	alert("Resgistre actualitzat");
	DirectoriCercador();
}

function MostraDirectoriDelete(id)
{
	document.getElementById("ButtonEliminaTOT").onclick = function(){DirectoriDelete(id);}
	$("#DIVEliminaTOT").fadeIn("slow");
}

function DirectoriDelete(id)
{
	$.post("PHP/Directori/DirectoriDelete.php",{id:id},LlegadaDirectoriDelete);
}

function LlegadaDirectoriDelete(data)
{
	$("#DIVEliminaTOT").fadeOut("slow");
	alert("Registre eliminat correctament");
	DirectoriCercador();
}

function EditaFitxaDirectoriPersonal(id){
	document.location = "profile.php?id="+id;
}