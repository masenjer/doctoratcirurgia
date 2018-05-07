

function ComprovaLogin()
{
	var u =  $('#LGUsuario').val();
	var p =  $('#LGPassword').val();
	
	$.get("PHP/ComprovaLogin.php",{u:u,p:p},LlegadaComprovaLogin);	
}

function LlegadaComprovaLogin(data)
{
	if (data == "1")
	{
		document.location = "http://serveiassistencialdesalut.uab.cat";
	}
	else
	{
		alert("Usuario o Password incorrectos");	
	}	
}

