
 
     	jQuery(document).ready(function($){

	    $.history.init(function(hash){
			switch (hash)
			{
				case "!/Directori":		MostraDirectori();
										break;	
				
				case "!/Publicacions":	MostraPublicacions();
										break;
											
				case "":			
				case "!/home":			HomeCarrega();
										break;
									
				default:				var cadena = hash.split("_");
										if (cadena[0] == "!/MS") CanviaCPage(cadena[1]);
										else{										
											cadena[1] = cadena[1].replace("\!\/","");	
											MostraPageHash(cadena[1], cadena[2]);
										}
										break;
					
			}
			
			
			
    },
    { unescape: ",/" });
});
// JavaScript Document