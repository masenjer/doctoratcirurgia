function NovaCategoriaUnitatDocent()
{
	$.get("PHP/Directori/CategoriaUnitatDocentAdd.php",{},LlegadaNovaCategoriaUnitatDocent);
}

function NovaCategoriaUnitatDocentTitol()
{
	$.get("PHP/Directori/CategoriaUnitatDocentAddTitol.php",{},LlegadaNovaCategoriaUnitatDocent);
}

function LlegadaNovaCategoriaUnitatDocent(data)
{
	//if (!data) window.location.reload();
	window.location.reload();
}

function DeleteCategoriaUnitatDocent(IdCat){
	$.post("PHP/Directori/CategoriaUnitatDocentCuentaDelete.php",{IdCat:IdCat},ConfirmaDeleteCategoria);
}

function ConfirmaDeleteCategoria(data){
	var cadena =  data.split("|");
	
	if (confirm("Hi ha "+cadena[1]+" registres que contenen aquesta categoria, a l'esgborrar-la aquests registres no s'esborraran però quedaran sense categoria")){
		$.post("PHP/Directori/CategoriaUnitatDocentDelete.php",{IdCat:cadena[0]},LlegadaNovaCategoriaUnitatDocent);	
	}
}

function EditaTitolCategoriaUnitatDocent(id)
{
	$("#href_ud_"+id).removeAttr("href");

	document.getElementById("tdCategoriaUnitatDocent"+id).ondblclick =  function (){};

	var titol = $('#DIVTitolCategoriaUnitatDocent'+id).html();

	var accions = ' onKeyUp="submitenter(14,event,'+id+')"';
	
	$('#tdCategoriaUnitatDocent'+id).html('<input type="text" id="TextTitolCategoriaUnitatDocent'+id+'" value="'+ titol +'" '+accions+' />');
}

function CancelaTitolCategoriaUnitatDocent(id)
{
	window.location.reload();
}

function GuardaTitolCategoriaUnitatDocent(id)
{
	var titol = $('#TextTitolCategoriaUnitatDocent'+id).val();
	$.get("PHP/Directori/CategoriaUnitatDocentGuardaTitol.php",{id:id,titol:titol},LlegadaGuardaTitolCategoriaUnitatDocent);
}

function LlegadaGuardaTitolCategoriaUnitatDocent(data)
{
	window.location.reload();

}

function GuardaRangCategoriaUnitatDocent(id)
{
	var rang = $('#OrdenCategoriaUnitatDocent'+id).val();
	$.get("PHP/Directori/CategoriaUnitatDocentGuardaRang.php",{id:id,rang:rang},LlegadaGuardaRangCategoriaUnitatDocent);
} 

function LlegadaGuardaRangCategoriaUnitatDocent(data)
{
	//if (!data) window.location.reload();
	window.location.reload();
//	MenuCategoriaUnitatDocentCarrega(data); 
}

function MenuCategoriaUnitatDocentCarrega()
{
	$.get("PHP/Directori/CategoriaUnitatDocentMenuCarrega.php",{},LlegadaMenuCategoriaUnitatDocentCarrega);	
}

function LlegadaMenuCategoriaUnitatDocentCarrega(data){
	$('#DIVCategoriesUnitatDocent').html("");	
	$('#DIVCategoriesUnitatDocent').html(data);
	CanviaColorWeb($("#VARColorWeb").val());	 
}






