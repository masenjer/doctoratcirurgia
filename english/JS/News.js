// JavaScript Document

window.onload = function (){
DefineCalendario('SearchDesde');
DefineCalendario('SearchHasta');
}


function SearchNews(id){
	var txt = $("#SearchText").val();
	var Desde = $("#SearchDesde").val();
	var Hasta = $("#SearchHasta").val();
	
	$.post("PHP/News/Search.php",{id:id, txt:txt, Desde:Desde, Hasta:Hasta},LlegadaSearchNews);
}

function SearchAllNews(id){
	$("#SearchText").val("");
	$("#SearchDesde").val("");
	$("#SearchHasta").val("");
	
	$.post("PHP/News/Search.php",{id:id},LlegadaSearchNews);
}

function LlegadaSearchNews(data){
	$(".ListadoDossierNoticies").html(data);	
}