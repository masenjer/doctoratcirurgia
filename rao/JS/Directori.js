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
	var es_ca = $("#Especialitat_caNewDirectori").val();
	var es_es = $("#Especialitat_esNewDirectori").val();
	var e = $("#EmailNewDirectori").val();
	var cat1 = $("#Categoria1NewDirectori").val();
	var cat2 = $("#Categoria2NewDirectori").val();
	var ud1 = $("#UD1NewDirectori").val();
	var ud2 = $("#UD2NewDirectori").val();
	
	if (!cat1){
		alert("Has de seleccionar com a mínim una categoria per aquesta persona");
		return false;
	}
	
	$.post("PHP/Directori/DirectoriAddNew.php",{n:n, c:c, es_ca:es_ca, es_es:es_es, e:e, cat1:cat1, cat2:cat2, ud1:ud1, ud2:ud2, IMG:IMG},LlegadaAddNewDirectori);
	
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
	var es = $("#EspecialitatEditaDirectori"+id).val();
	//var ac = $("#ConeixementNewDirectori").val();
	var es_ca = $("#Especialitat_caEditaDirectori"+id).val();
	var es_es = $("#Especialitat_esEditaDirectori"+id).val();
	var es_en = $("#Especialitat_enEditaDirectori"+id).val();
	var e = $("#EmailEditaDirectori"+id).val();
	var cat1 = $("#Categoria1EditaDirectori"+id).val();
	var cat2 = $("#Categoria2EditaDirectori"+id).val();
	var ud1 = $("#UD1EditaDirectori"+id).val();
	var ud2 = $("#UD2EditaDirectori"+id).val();

	var tutor = ($("#tutor"+id).prop("checked"))?1:0;


	var Carrec_ca = $("#Carrec_caEditaDirectori"+id).val();
	var Carrec_es = $("#Carrec_esEditaDirectori"+id).val();
	var Carrec_en = $("#Carrec_enEditaDirectori"+id).val();
	var Tesis = $("#TesisEditaDirectori"+id).val();
	var Horari = $("#HorariEditaDirectori"+id).val();
	var Adreca = $("#AdrecaEditaDirectori"+id).val();
	var Xarxes = $("#XarxesEditaDirectori"+id).val();
	var u = $("#UbicacioEditaDirectori"+id).val();
	var t = $("#TelefonEditaDirectori"+id).val();
	
//	if (!cat){
//		alert("Has d'indicar la categoria a la que pertany aquesta persona");
//		return false;	
//	}


	//alert(id);
	//id +="_"; 
	//if (cadena = id.split("_")) id = cadena[0]; 
	
	if (!cat1 && !cat2){
		alert("Has de seleccionar com a mínim una categoria per aquesta persona");
		return false;
	}else{
		$.post("PHP/Directori/DirectoriUpdate.php",{id:id, n:n, c:c, es_ca:es_ca, es_es:es_es, es_en:es_en, e:e, cat1:cat1, cat2:cat2, ud1:ud1, ud2:ud2, Tesis:Tesis, Horari:Horari, u:u, t:t, Carrec_ca:Carrec_ca, Carrec_es:Carrec_es, Carrec_en:Carrec_en, IMG:IMG, Xarxes:Xarxes, tutor:tutor},LlegadaDirectoriUpdate);
		}
}

function LlegadaDirectoriUpdate(data)
{
	//alert(data);
	//window.location.reload();
	
	var cadena = data.split("|");
	
	if (cadena[1])
	{
		$("#FormPujaEditaIMGDirectori"+cadena[0]).attr("action","PHP/Directori/DirectoriUploadFiles.php?nom="+cadena[0]+cadena[1]+"&id="+cadena[0]);
		$("#FormPujaEditaIMGDirectori"+cadena[0]).submit();	
	}
	alert("Resgistre actualitzat");
	

	//DirectoriCercador();
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

function mostraTutor(){
	if($("#checktutor").prop("checked")){
		$(".tutor").addClass("hidden");
	}else $(".tutor").removeClass("hidden");
}

