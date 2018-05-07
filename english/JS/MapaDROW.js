
//UAB	->	ffa600
//NoUAB	->	00ff00

var AtrImgDROW = false;
var CadenaMapaDROW =  new Array(); 
var CadenaIdDROW = new Array();
var CadenaTitolDROW = new Array();
var MaxXDROW =  new Array();
var MinXDROW = new Array();
var MaxYDROW =  new Array();
var MinYDROW = new Array();
var ColorDROW = new Array();
var AccioDROW = new Array();
var NumDROW = 0;
var DocDROW ="";

var anchuraDROW = "";
var alturaDROW = "";

var wDROW = "";
var hDROW = "";

function CarregaMapaDROW()
{
	$('#VideoEnFicha').html('');

	if (!AtrImgDROW) $.get("PHP/MapaDROWCarregaCadena.php",{},LlegadaCarregaCadenaMapaDROW);
	else MapaDROWOpen();

}

function LlegadaCarregaCadenaMapaDROW(data)
{
	var cadena = data.split("?|?|?");
	AtrImgDROW = cadena[0];
//	CadenaMapa = cadena[1];
	//cadena = "";
	
	var cadena2 = cadena[1].split("?*?");
	var cadena3 = "";
	NumDROW = cadena2.length;
	
	for (i=0;i<NumDROW;i++)
	{
		cadena3 = cadena2[i].split("*#*");
		CadenaIdDROW[i] = cadena3[0];
		CadenaTitolDROW[i] = cadena3[1];
		cadena4 = cadena3[2].split(",");
				
		  MaxXDROW[i] = cadena4[0];
		  MinXDROW[i] = cadena4[1];
		  MaxYDROW[i] = cadena4[2];
		  MinYDROW[i] = cadena4[3];
				
		CadenaMapaDROW[i] = cadena3[3];
		ColorDROW[i] = cadena3[4];
		AccioDROW[i] = cadena3[5];
	}
		
	MapaDROWOpen();
}

function MapaDROWOpen()
{
	var cadena = AtrImgDROW.split("|");
	$("#ImatgeDrow").html('<img src="imgDROW/'+cadena[0]+'" style="width:'+cadena[1]+'px;height:'+cadena[2]+'px" >');
	
	wDROW = cadena[1];
	hDROW = cadena[2];
	
	$("#ImatgeDrow").css("width",wDROW+"px");
	$("#ImatgeDrow").css("height",hDROW+"px");
	
	anchuraDROW = parseInt(($(window).width()- cadena[1])/2);
	alturaDROW = parseInt(($(window).height()- cadena[2])/2);
	
	$("#ImatgeDrow").css("top",alturaDROW+"px");
	$("#ImatgeDrow").css("left",anchuraDROW+"px");
	
	$("#coordenadas").css("top",alturaDROW+21+"px");
	$("#coordenadas").css("left",anchuraDROW+551+dif2+dif+"px");
		
	$("#DIVMapaDROW").fadeIn("slow");

}

function MarcaDROW()
{
	$(document).mousemove(function(e){
	
		
		x = e.pageX -anchuraDROW -1 - dif ;
		y = e.pageY - alturaDROW -21 ;
		
		//$('#coordenadas').html(x+','+y);
		ComprovaPuntsDROW(x,y);
 });
}

function DesmarcaDROW()
{

	document.getElementById("ImatgeDrow").onclick = function(){};
	
	$(document).mousemove(function(e){
	// e.pageX - gives you X position
	// e.pageY - gives you Y position
	//$('#coordenadas').html('');
});
}

function ComprovaPuntsDROW(x,y)
{
	var cadena, puntos;
	
	DocDROW = "";
	
//	if (x%2 == 0) X = x/2;
//	else X = (x+1)/2; 
//	if (y%2 == 0) Y = y/2;
//	else Y = (y+1)/2; 
	
	X=x;
	Y=y;
//$('#coordenadas').html('<span class="x tit">X:'+x+'</span><br><span class="y tit">Y:'+y+'</span><br>impar');
	aux = false;
	aux2 = false;

	for (i=0;i<NumDROW;i++)
	{

		if ((X <= MaxXDROW[i])&&( X >= MinXDROW[i])&&(Y <= MaxYDROW[i])&&( Y >= MinYDROW[i]))
		{
			
			cadena = CadenaMapaDROW[i].split("|");
			//alert(cadena);
			for (j=1;j<cadena.length;j++)
			{
				puntos = cadena[j].split(".");
				if ((puntos[0]==X)&&(puntos[1]==Y))
				{ 
					aux2= true;
					$("#DIVTitolDROW").html(CadenaTitolDROW[i]);	
					EsdelaUAB(i);
					DocDROW = AccioDROW[i];				
					if(DocDROW)
					{
						$('#ImatgeDrow').css('cursor', 'pointer' );
						$('#ImatgeDrow').attr('title','Fes clic per a descarregar el fitxer');
 
						document.getElementById("ImatgeDrow").onclick = function(){open ("DocsDROW/"+DocDROW, "_blank", "");}
						aux = true;					
					}
				}
			}
			
			if (!aux)
			{
				
				$('#ImatgeDrow').css("cursor","default");
				$('#ImatgeDrow').attr('title','');
				
				document.getElementById("ImatgeDrow").onclick = function(){};
			}
			//DocDROW = ""
			//cadena = "";
			
			
		}
	}
	
	if (!aux2)
	{
		$("#DIVTitolDROW").html("");
		$('#ImatgeDrow').css("cursor","default");
		$('#ImatgeDrow').attr('title','');
		$("#PertanyUAB").hide();
				
		document.getElementById("ImatgeDrow").onclick = function(){};
	}
	
	//$("#coordenadas").html(resultado); 
	 
}

function EsdelaUAB(i)
{
	var color = ColorDROW[i];
	if(color=="#00ff00")
	{
		var  mensaje="No pertany a la UAB";
		var aux = 0;
 
	}else
	{
		var mensaje="Pertany a la UAB";	
		var aux = 1;
	}
	
	$("#PertanyUAB").removeClass("PertanyUAB_"+(aux+1)%2);
	$("#PertanyUAB").addClass("PertanyUAB_"+aux);
	
	$("#PertanyUAB").html(mensaje);	
	$("#PertanyUAB").show();
}


function TancaFitxaDROW()
{
	$("#DIVMapaDROW").fadeOut("slow");
	CarregaVideo();
}



$(window).resize(function() {

	//alert("entro");
	anchuraDROW = parseInt(($(window).width()- wDROW)/2);
	alturaDROW = parseInt(($(window).height()- hDROW)/2);
	
	if ($(window).height()> hDROW)	$("#coordenadas").css("top",alturaDROW+21+"px");
	else $("#coordenadas").css("top","45px");
	$("#coordenadas").css("left",anchuraDROW+551+"px");
	//$(window).scrollTop(0);

	


});	
