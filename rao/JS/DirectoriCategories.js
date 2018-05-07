function NovaCategoriaDirectori()
{
	$.get("PHP/Directori/CategoriaDirectoriAdd.php",{},LlegadaNovaCategoriaDirectori);
}

function NovaCategoriaDirectoriTitol()
{
	$.get("PHP/Directori/CategoriaDirectoriAddTitol.php",{},LlegadaNovaCategoriaDirectori);
}

function LlegadaNovaCategoriaDirectori(data)
{
	//if (!data) window.location.reload();
	MenuCategoriaDirectoriCarrega();
	TancaEliminaTOT();
}

function DeleteCategoriaDirectori(IdCat){
	$.post("PHP/Directori/CategoriaDirectoriCuentaDelete.php",{IdCat:IdCat},ConfirmaDeleteCategoria);
}

function ConfirmaDeleteCategoria(data){
	var cadena =  data.split("|");
	
	if (confirm("Hi ha "+cadena[1]+" registres que contenen aquesta categoria, a l'esgborrar-la aquests registres no s'esborraran però quedaran sense categoria")){
		$.post("PHP/Directori/CategoriaDirectoriDelete.php",{IdCat:cadena[0]},LlegadaNovaCategoriaDirectori);	
	}
}

function EditaTitolCategoriaDirectori(id)
{

	var titol = $('#DIVTitolCategoriaDirectori'+id).html();

	var accions = ' onKeyUp="submitenter(12,event,'+id+')"';
	
	$('#tdMenuCategoriaDirectori'+id).html('<input type="text" id="TextTitolCategoriaDirectori'+id+'" value="'+ titol +'" '+accions+' />');
}

function CancelaTitolCategoriaDirectori(id)
{
	$('#DIVTitolCategoriaDirectori'+id).html($('#tdCategoriaDirectoriAntic'+id).val());
}

function GuardaTitolCategoriaDirectori(id)
{
	var titol = $('#TextTitolCategoriaDirectori'+id).val();
	$.get("PHP/Directori/CategoriaDirectoriGuardaTitol.php",{id:id,titol:titol},LlegadaGuardaTitolCategoriaDirectori);
}

function LlegadaGuardaTitolCategoriaDirectori(data)
{
	window.location.reload();

}

function GuardaRangCategoriaDirectori(id)
{
	var rang = $('#OrdenCategoriaDirectori'+id).val();
	$.get("PHP/Directori/CategoriaDirectoriGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangCategoriaDirectori);
} 

function LlegadaGuardaRangCategoriaDirectori(data)
{
	//if (!data) window.location.reload();
	window.location.reload();
//	MenuCategoriaDirectoriCarrega(data); 
}

function MenuCategoriaDirectoriCarrega()
{
	$.get("PHP/Directori/CategoriaDirectoriMenuCarrega.php",{},LlegadaMenuCategoriaDirectoriCarrega);	
}

function LlegadaMenuCategoriaDirectoriCarrega(data){
	$('#DIVCategoriesDirectori').html("");	
	$('#DIVCategoriesDirectori').html(data);
	CanviaColorWeb($("#VARColorWeb").val());	 
}






