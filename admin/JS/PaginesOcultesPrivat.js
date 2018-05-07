function NovaPageOculta(IdCap, IdLin)
{
	$.get("PHP/PageOcultaAdd.php",{IdCap:IdCap,IdLin:IdLin},LlegadaNovaLPage);
}
