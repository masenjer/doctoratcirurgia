
function Cercador()
{

	//alert("entrol");
	var texto = $("#TextCerca").val();

	
	//$("#ResultatCerca").html(texto);
	
	$.get("PHP/Cercador.php",{texto:texto},LlegadaCercador);

}

function LlegadaCercador(data)
{
	$("#ResultatCerca").html(data);
	$('#ResultatCerca').show('slow');
}
