
function AddNewIMGHome(IMG)
{
	IMG = IMG.split('\\');
	var name = IMG[IMG.length-1];

	$.get("PHP/IMGHomeAddNew.php",{name:name},LlegadaAddNewIMGHome);
}

function LlegadaAddNewIMGHome(data)
{
	var cadena = data.split("|");
	
	$("#FormPujaNewIMGHome").attr("action","PHP/IMGHomeUploadFiles.php?nom="+cadena[0]+cadena[1]);
	$("#FormPujaNewIMGHome").submit();	
	
	CarregaLlistatGestioIMGhome();
}

function CarregaLlistatGestioIMGhome()
{
	$.get("PHP/IMGHomeCarregaLlistatGestio.php",{},LlegadaCarregaLlistatGestioIMGhome);
}

function LlegadaCarregaLlistatGestioIMGhome(data)
{
	$("#DIVIdGestioIMGHome").html(data);
}

function MoveIMGHome(id,orden,op)
{
	$.get("PHP/IMGHomeMove.php",{id:id,orden:orden,op:op},CarregaLlistatGestioIMGhome);
}

function DeleteIMGHome(id,ruta,orden)
{
	$.get("PHP/IMGHomeDelete.php",{id:id,orden:orden,ruta:ruta},CarregaLlistatGestioIMGhome);
}

function CarregaLlistatImatgesHome()
{
	$.get("PHP/IMGHomeCarregaLlistat.php",{},LlegadaCarregaLlistatImatgesHome);
}

function LlegadaCarregaLlistatImatgesHome(data)
{
	//alert(data);
	var cadena = data.split("|");
	MostraImatgesHomeMovils(cadena[0],cadena[1],0);
}

function MostraImatgesHomeMovils(DataIMG,mida,n)
{
	//alert(DataIMG);
	var data = DataIMG.split("*#*");
	
	actual = n % mida;
	//alert("actual:"+actual+", mida:"+mida);
	if (n != 0)
	{
		$("#DIVIMGHome2").html($("#DIVIMGHome1").html());
		//$("#DIVIMGHome2").css("background-image", ($("#DIVIMGHome1").css("background-image")));
		$("#DIVIMGHome2").show();
		
	}
	

	var cadena = data[actual].split("?#?");
	
	
	//alert('<img src="IMGHomeDin/'+cadena[0]+'" style="'+AoA+'">');
	$("#DIVIMGHome1").css("background","#d43");
	
	$("#DIVIMGHome1").delay(500).html('<img class="img-fluid" src ="../IMGHomeDin/'+cadena[0]+'">');
	
	$("#DIVIMGHome2").fadeOut(2000);
	
	n++;
	
	setTimeout (function (){MostraImatgesHomeMovils(DataIMG,mida,n)}, 5000);

}

function pausecomp(ms) {
ms += new Date().getTime();
while (new Date() < ms){}
} 