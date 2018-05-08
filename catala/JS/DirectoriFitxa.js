var PestanyasDirectoriFitxa = new Pestanyas();


function InicializaPestanyas(){ //Se llama desde DIVS/DirectoriFitxa.php
	
	var config1 = {
		filebrowserBrowseUrl : '/vendor/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
	};

	PestanyasDirectoriFitxa.Constructor(0,"PestanyasDirectoriFitxa","Pestanya","PestanyaSeleccionada");
	MuestraPerfilDirectoriFitxa();
	$('#TACuerpoPerfilDirectori').ckeditor(config1);
	$('#TACuerpoInvesDirectori').ckeditor(config1);
	$('#TACuerpoPubliDirectori').ckeditor(config1);
}

function OcultaDIVSDirectoriFitxa(){
	$("#DIVCuerpoPerfilDirectori").hide();
	$("#DIVCuerpoInvesDirectori").hide();
	$("#DIVCuerpoPubliDirectori").hide();
}

function MuestraPerfilDirectoriFitxa(){
	OcultaDIVSDirectoriFitxa();
	$("#DIVCuerpoPerfilDirectori").show();
	PestanyasDirectoriFitxa.SelectRow(0);	
}

function MuestraInvesDirectoriFitxa(){
	OcultaDIVSDirectoriFitxa();
	$("#DIVCuerpoInvesDirectori").show();
	PestanyasDirectoriFitxa.SelectRow(1);	
}

function MuestraPubliDirectoriFitxa(){
	OcultaDIVSDirectoriFitxa();
	$("#DIVCuerpoPubliDirectori").show();
	PestanyasDirectoriFitxa.SelectRow(2);	
}

function GuardaSubFitxaDirectori(form,id){
	var txt = $("#TACuerpo"+form+"Directori").val();
	$.post("PHP/Directori/SubFitxaGuarda.php",{form:form, id:id, txt:txt},LlegadaGuardaSubFitxaDirectori);
}

function LlegadaGuardaSubFitxaDirectori(data){
	alert(data);	
}

