
//////////////////////////////////////////////////



function replaceAll( text, busca, reemplaza )
{
	while (text.toString().indexOf(busca) != -1)
		text = text.toString().replace(busca,reemplaza);
	return text; 
}

function ValidarEmail(cadena)
{
 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
 if(reg.test(cadena) == false) 
 	{
      return true;
	}
}

function DefineCalendario(Calendario)
{
	$("#"+Calendario).datepicker({
		showOn: 'both',
   		buttonImage: 'img/Calendario.png',
        buttonImageOnly: true,
	    changeYear: true,
		numberOfMonths: 1,
		onSelect: function(textoFecha, objDatepicker){
			//$("#mensaje").html("<p>Has seleccionado: " + textoFecha + "</p>");
		   }
		}); 	
}

function CarregaPagina()
{
	//MenuSCarrega();
	//BannerHome();
	//HomeCarrega();
	CompruebaSiMenuGU();

	
	DefineCalendario('FechaNoticia');
	DefineCalendario('FechaNoticiaIN');
	DefineCalendario('FechaNoticiaOUT');

	//NoticiesCarregaContingut();
	//NoticiesCarregaContingutHistoric();
	
	if (!window.location.hash)
	{
		//window.location.hash = "!/home";
		//HomeCarrega();
	}

	CarregaColorsWeb();
	//ComprovaSiLogin();
}

function HomeCarrega()
{
	$('#ContingutPages').hide();
	$('#Directori').hide();		
	$('#Publicacions').hide();
	$('#MapaWeb').hide();
	$("#DIVHome").fadeIn(1000);
	$('#ME').html("");
	
	//CarregaMenuDestacatsHome();
	//CarregaMenuEnDirHome();
	//CarregaMenuContacteHome();
	
	//CarregaVideo();

	window.location.hash = "!/home";
	
	CarregaMapaGoogle();
}


function MenuSCarrega()
{
	$.get("PHP/MenuSCarrega.php",{},LlegadaMenuSCarrega);
}

function LlegadaMenuSCarrega(data)
{
	$("#DIVMenuSuperior").html(data);
}


function MenuECarrega(n)
{
	$.get("PHP/MenuECarrega.php",{n:n},LlegadaMenuECarrega);
}

function LlegadaMenuECarrega(data) 
{
	$('#VideoEnFicha').html("");
	$('#ME').html("");	
	$('#ME').html(data);
	CanviaColorWeb($("#VARColorWeb").val());	 
}

function CanviaCPage(tipo)
{
	MenuECarrega(tipo);
	MenuPaginesOcultesCarrega(tipo);
	MenuMDCarrega(tipo);
	CercaPrimeraPagina(tipo);
}

function CercaPrimeraPagina(IdCap)
{
	$.get("PHP/CercaPrimeraPagina.php",{IdCap:IdCap},LlegadaCercaPrimeraPagina);
}

function LlegadaCercaPrimeraPagina(data)
{
	MostraPage(data,1);

	if (!data) 	$("#Imprimible").hide();

}


function MostraPageHash(id,op)
{
	$("#Imprimible").show();

	$("#DIVHome").hide();	
	//window.location.hash = "!"+id+"_"+op;

	$.get("PHP/MostraPage.php",{id:id,op:op},LlegadaMostraPageHash);
}

function LlegadaMostraPageHash(data)
{
	var cadena = data.split("|");
	
	//alert(cadena[4]);
	MenuMDCarrega(cadena[4]);
	
	$('#DIVTitolPage').html("");	
	$('#DIVTitolPage').html(cadena[0]);	 

	$('#TAContingut').html("");	
	$('#DIVContingutPage').html("");	
	$('#DIVContingutPage').html(cadena[1]);	 
	
	
	if (cadena[5]!= 2)
	{
		//alert(cadena[5]);
		MenuECarrega(cadena[4]);

		$('#DIVRutaPage').html("");	
		$('#DIVRutaPage').html(cadena[2]);
	}
	else
	{
		//$("#ME").html("");	
	}
	
	MenuPaginesOcultesCarrega(cadena[4]);

	
	$('#DIVEditaContingutPage').hide();
	$('#DIVContingutPage').fadeIn(500);	
	
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$('#Directori').hide();
	$('#Publicacions').hide();
	
	$("#ContingutPages").fadeIn(1000);
	
	//MEnuECarrega(cadena[5]);
	
	document.getElementById("ButtonEditContingut").onclick =  function (){MostreEditContingut(cadena[3])};
	document.getElementById("ButtonCancelaContingut").onclick =  function (){CancelaEditCont(cadena[3])};
	
 	//$("#DIVContingutPage").translate({original : 'ca'});

	CanviaColorWeb($("#VARColorWeb").val());
	
	if(cadena[0]){
		var idop= cadena[3].split(",");	
		var TitolHash = replaceAll(cadena[0], " ", "-" ); //.replace(" ","");
			TitolHash = replaceAll(TitolHash, "'", "" ); //.replace(" ","");
		//window.location.hash = "!/"+TitolHash+"_"+idop[0]+"_"+idop[1];
	}
}


function MostraPage(id,op)
{
	$("#Imprimible").show();

	$("#DIVHome").fadeOut(1000);

	$.get("PHP/MostraPage.php",{id:id,op:op},LlegadaMostraPage);
}

function LlegadaMostraPage(data)
{
	//alert("caca");

	var cadena = data.split("|");
	
	//console.log(cadena);

	$('#DIVTitolPage').html("");	
	$('#DIVTitolPage').html(cadena[0]);	 

	$('#TAContingut').html("");	
	$('#DIVContingutPage').html("");	
	$('#DIVContingutPage').html(cadena[1]);	 
	
	if (cadena[5]!= 2)
	{
		$('#DIVRutaPage').html("");	
		$('#DIVRutaPage').html(cadena[2]);
	}
	
	$('#DIVEditaContingutPage').hide();
	$('#DIVContingutPage').fadeIn(500);	
	
	$('#DIVHome').hide();
	$('#MapaWeb').hide();
	$('#Directori').hide();
	$('#Publicacions').hide();

	$("#ContingutPages").fadeIn(1000);
	
	//MEnuECarrega(cadena[5]);

	//history.pushState(null, "", 'index.php#!/'.$row["Titol"].'_'.$row["IdLinMenu"].'_1');
	
	document.getElementById("ButtonEditContingut").onclick =  function (){MostreEditContingut(cadena[3])};
	document.getElementById("ButtonCancelaContingut").onclick =  function (){CancelaEditCont(cadena[3])};
	

	CanviaColorWeb($("#VARColorWeb").val());

	if(cadena[0]){
		var idop= cadena[3].split(",");	
		var TitolHash = replaceAll(cadena[0], " ", "-" ); //.replace(" ","");
			TitolHash = replaceAll(TitolHash, "'", "" ); //.replace(" ","");
		//window.location.hash = ";
		history.pushState(null,"", "#!/"+TitolHash+"_"+idop[0]+"_"+idop[1]);
	}
}

function MenuMDCarrega(id) 
{
	$.get("PHP/LinMDCarrega.php",{id:id},LlegadaMenuMDCarrega);
}

function LlegadaMenuMDCarrega(data) 
{
	$("[name='MD']").html("");	
	$("[name='MD']").html(data);	
	CanviaColorWeb($("#VARColorWeb").val());	 
 
}


function NoticiesCarregaContingut()
{
	$.get("PHP/NoticiesCarregaContingut.php",{},LlegadaNoticiesCarregaContingut);
}

function LlegadaNoticiesCarregaContingut(data)
{
	$("#NOT").html("");
	$("#NOT").html(data);
	

	setTimeout(CarregaMapaGoogle,1);
}

function NoticiesCarregaContingutHistoric()
{
	$.get("PHP/NoticiesCarregaContingutHistoric.php",{},LlegadaNoticiesCarregaContingutHistoric);
}

function LlegadaNoticiesCarregaContingutHistoric(data)
{
	$("#NOTHistoric").html("");
	$("#NOTHistoric").html(data);
}

function CarregaMenuDestacatsHome()
{
	$.get("PHP/DestacatMenuCarrega.php",{h:'1'},LlegadaMenuDestacatHomeCarrega);
}

function LlegadaMenuDestacatHomeCarrega(data)
{
	$('#ContHomeListDestacats').html("");
	$('#ContHomeListDestacats').html(data);
	
	CanviaColorButtons($("#VARColorButtons").val());
	
	/*
	$("#DIVIMGHome1").css("height",$('#ContHomeListDestacats').height()-15);	 
	$("#DIVIMGHome2").css("height",$('#ContHomeListDestacats').height()-15);	 
	*/
}

function CarregaMenuEnDirHome()
{
	$.get("PHP/EndirMenuHomeCarrega.php",{h:'1'},LlegadaCarregaMenuEnDirHome);
}

function LlegadaCarregaMenuEnDirHome(data)
{
	$('.ContHomeListEnDir').html("");
	$('.ContHomeListEnDir').html(data);
}

function AbreGestorEnDir()
{
	$('#VideoEnFicha').html('');
	$("#DIVGestioEnDir").fadeIn("slow");	
}

function CarregaEnllacIntern(URL)
{
	var cadena = URL.split("|");
	
	//CanviaCPage(cadena[0]);
	//MenuECarrega(cadena[0]);
	MenuPaginesOcultesCarrega(cadena[0]);
	MenuMDCarrega(cadena[0]);
	cadena[2] = parseInt(cadena[2]) + 1;
	
	MostraPage(cadena[1],cadena[2]);
}

function TancaGestorEnDir()
{
	//CarregaVideo();
	CarregaMenuEnDirHome();
	$('#DIVGestioEnDir').fadeOut();
}


function CarregaMenuContacteHome()
{
	$.get("PHP/ContacteHomeCarrega.php",{},LlegadaCarregaMenuContactHome);
}

function LlegadaCarregaMenuContactHome(data)
{
	$('.ContHomeContacte').html("");
	$('.ContHomeContacte').html(data);
	CanviaColorWeb($("#VARColorWeb").val());	 
}


function CarregaPaginaiMenus(IdC,IdL,Costat)
{
//	alert("IdC: "+IdC+" IdL: "+IdL+" Costat: "+Costat)
	MenuECarrega(IdC);
	MenuPaginesOcultesCarrega(IdC);
	MenuMDCarrega(IdC);
	if (IdL == ""){CercaPrimeraPagina(IdC);}
	else {MostraPage(IdL,Costat);}
		
}




function ConvertiraPDF()
{
	var data = 	window.location.hash;
	data = data.replace("#!","");
	var cadena = data.split("_");
	
	window.open('PHP/PDFCreate.php?id='+cadena[1]+'&op='+cadena[2]);
}

function LlegadaConvertiraPDF(data)
{
	alert(data);	
}


function ImprimirContingut()
{
	$("#Imprimible").printElement({printMode:'popup'});
}


function MostraFormulariEmail()
{
	$("#NomEmailContingut").val("");
	$("#OrigenEmailContingut").val("");
	$("#DestinatariEmailContingut").val("");
	
	$("#TAEmailcontingut").val("");
	
	$("#DIVFormulariEmail").fadeIn("slow");
}

function TancaFormEmail()
{
	$("#DIVFormulariEmail").fadeOut("slow");
}

function EnviaEmailcontingut()
{
	var data = 	window.location.hash;
	data = data.replace("#!","");
	var cadena = data.split("_");
	
	var id = cadena[0];
	var op = cadena[1];
	
	var nom = $("#NomEmailContingut").val();
	var origen = $("#OrigenEmailContingut").val();
	var desti = $("#DestinatariEmailContingut").val();
	
	var TA = $("#TAEmailcontingut").val();
	
	if (ValidaEnviaEmailcontingut(nom,origen,desti))
	$.post("PHP/EmailContingutEnvia.php",{ id:id, op:op, nom:nom, origen:origen, desti:desti, TA:TA},LlegadaEnviaEmailcontingut);
}

function LlegadaEnviaEmailcontingut(data)
{
	alert(data);
	TancaFormEmail();	
}

function ValidaEnviaEmailcontingut(nom,origen,desti)
{
	if (!nom) alert("Has d'introduir el teu nom");
	
	if (ValidarEmail(origen)) alert('Revisa que el teu email tingui una forma correcte tal que "usuari@nomhost.dominivalid"');
		 
	if (ValidarEmail(desti)) alert('Revisa que el mail del teu amic tingui una forma correcte tal que "usuari@nomhost.dominivalid"'); 
	
	if((!nom)||(ValidarEmail(origen))||(ValidarEmail(desti))) return false;
	else return true;
}

function CompruebaSiMenuGU()
{
	$.get("PHP/CompruebaPermisos.php",{},LlegadaCompruebaSiMenuGU);
}

function LlegadaCompruebaSiMenuGU(data)
{
	
	var cadena = data.split("|");
	
	if (cadena[0] == "1")
	{
		$("#DIVBotoGU").delay(3000).show();	
	}
	else
	{
		$("#DIVBotoGU").hide();	
	}
	
	
	if (cadena[1] == "1")
	{
		$("#MenuLateralAdmin").show();
	}
	else
	{
		$("#MenuLateralAdmin").hide();	
	}
	

}


function CarregaMapaGoogle()
{
	$("#TDGoogleMaps").html('<iframe id="iFrameGoogleMaps" style="margin:0; padding:0; display:block; width:100%; height:100%; border: 1px solid #d7d5d6 "  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=Institut+de+Neuroci%C3%A8ncies+(INc),+Barcelona&amp;aq=0&amp;oq=institut+de+neurocienc&amp;sll=41.692248,1.745868&amp;sspn=3.547849,4.938354&amp;ie=UTF8&amp;hq=Institut+de+Neuroci%C3%A8ncies+(INc),&amp;hnear=Barcelona,+Catalu%C3%B1a&amp;ll=41.498613,2.106617&amp;spn=0.249808,0.14693&amp;t=m&amp;output=embed"></iframe>');

	$("#iFrameGoogleMaps").css("height",$("#TDGoogleMaps").height());
}
