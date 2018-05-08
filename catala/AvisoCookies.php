<style>
div#MessageCookie {
    width: 100%;
    background: none repeat scroll 0% 0% rgb(248, 248, 248);
    border: 1px solid rgb(0, 0, 0);
    z-index: 1000;
    overflow: hidden;
}
div#ContingutCookie {
    max-width: 930px;
    margin: 0px auto;
}
div#ContingutCookie div#msgCookie {
    max-width: 800px;
    float: left;
    margin: 5px 10px 5px 0px;
}
div#ContingutCookie div#msgCookie p.textCookie {
    color: rgb(0, 0, 0);
    font-family: Verdana,Arial,Heveltica;
    font-weight: normal;
    font-size: 11px;
    text-align: left;
    margin: 5px 0px;
}

div#ContingutCookie div#acceptCookie {
    max-width: 120px;
    float: left;
    margin: 5px 0px;
}
p#buttonCookie {

    border-radius: 4px;
    padding: 5px;
    color: rgb(255, 255, 255);
    font-family: Verdana,Arial,Heveltica;
    font-weight: normal;
    font-size: 11px;
    text-decoration: none;
        -moz-text-decoration-color: -moz-use-text-color;
        -moz-text-decoration-line: none;
        -moz-text-decoration-style: solid;
    background-color: rgb(65, 72, 75);
    margin: 0px;
        margin-top: 0px;
        margin-right-value: 0px;
        margin-bottom: 0px;
        margin-left-value: 0px;
        margin-left-ltr-source: physical;
        margin-left-rtl-source: physical;
        margin-right-ltr-source: physical;
        margin-right-rtl-source: physical;
    cursor: pointer;
}
</style>
<!--

 ClickTale Top part 

-->

<script type="text/javascript">
var expirationCookie = 365000; //Duracio en dies de la cookie al ser creada.
 createMessage();
//Creacio de la cookie que mostra el missatge.
//nombre: nom de la cookie a crear.
//valor: valor de la cookie a crear.
//tiempo: venciment de la cookie.
function createCookieMsg(nombre, valor, tiempo){
	var dominio = window.location.hostname;
	var arr_dominio = dominio.split(".");
	while(arr_dominio.length > 2){ arr_dominio.shift(); }
	var dominio_principal = arr_dominio.join(".");
	var date = new Date();
	date.setTime(date.getTime()+(tiempo*24*60*60*1000));
	var expiration = date.toGMTString();
	var thecookie = nombre + " = " + escape(valor) + "; expires=" + expiration+"; path=/; domain=."+dominio_principal;
	document.cookie = thecookie;
}

//Recorregut per les cookies que te el navegador per comprovar si existeix la cookie 'messageCookie'.
//nombre: nom de la cookie a trobar.
function getCookieMsg(nombre){
	var nombreCookie, valorCookie, cookie = null, cookies = document.cookie.split(';');
	for (i=0; i<cookies.length; i++){
		valorCookie = cookies[i].substr(cookies[i].indexOf('=') + 1);
		nombreCookie = cookies[i].substr(0,cookies[i].indexOf('=')).replace(/^\s+|\s+$/g, '');
		if (nombreCookie == nombre){
			cookie = unescape(valorCookie);
		}
	}
	return cookie;
}

//Creacio del missatge de cookies, afegit al final del body de html.
//textMsgCookie: cos del missatge a mostrar.
//textButtonCookie: text del boto per acceptar les cookies.
function createMessage(){
	//Comprovar si existeix la cookie 'messageCookie'.
	if(!getCookieMsg('messageCookie'+window.location.hostname)){
		var divMessage = "<div id='MessageCookie'>";
		divMessage += "<div id='ContingutCookie'>";
		divMessage += "<div id='msgCookie'>";
		divMessage += '<p class="textCookie">Aquest web utilitza <em>cookies</em> pròpies per oferir-te una millor experiència i servei. En continuar amb la navegació entenem que s\'accepta la nostra <a class="texto_normal" target="_blank" href="http://uab.cat/doc/Politiques-Cookies">política de cookies</a>.</p>';
		divMessage += "</div>";
		divMessage += "<div id='acceptCookie'>";
		divMessage += "<p id='buttonCookie' onclick='hideMessage()'>Tancar</p>";
		divMessage += "</div>";
		divMessage += "</div>";
		divMessage += "</div>";
		jQuery("body").prepend(divMessage);
	}
}

//Ocultar el missatge i crear la cookie de missatge.
function hideMessage(){
	createCookieMsg('messageCookie'+window.location.hostname, 'true', expirationCookie);
	jQuery("#MessageCookie").hide();
}</script>