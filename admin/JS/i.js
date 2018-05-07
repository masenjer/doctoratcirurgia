

///////////////////CarregaPagina()
$(document).ready(function(){
	
	
		 var config1 = {
			toolbar: [
				['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
				['Image','Maximize'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
			],
			filebrowserBrowseUrl : '/vendor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
		};
	
		
		 var config2 = {
			filebrowserBrowseUrl : '/vendor/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : '/vendor/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : 'PHP/UploadFiles.php?op=1'
		};
	
		var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1; 
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		var isiPhone = navigator.userAgent.match(/iPhone/i) != null;
		
		
		if ((!isiPad)&&(!isiPad)&&(!isAndroid))
		{
			$('#TAContingut').ckeditor(config2);
			$('#TANoticia').ckeditor(config2);
			$('#TAInfoContacte').ckeditor(config1);
		}
		
		
		DefineCalendario('FechaNoticia');
		DefineCalendario('FechaNoticiaIN');
		DefineCalendario('FechaNoticiaOUT');
	
		
		MenuNoticiesCarregaHistoric();
		MenuNoticiesCarregaActiu();
		MenuDestacatCarrega();
		MenuEnDirCarrega();
		CargaNoticias('');	
		CarregaGridGU();
		InicialitzaUserGU();
		AnadirDestacado();
		AnadirEnDir(); 
		
		//CompruebaSiMenuGU();
			
		//SI.Files.stylizeById('ImatgeNoticia');
	
	
	
});
//////////////////////////////////////////////////

