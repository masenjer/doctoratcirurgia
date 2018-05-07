/*			AJAX request example with hashes		*/
/*	by Adrián Navarro (http://adrian.navarro.at)	*/
/*				<adrian@navarro.at>					*/

/* Monitors the URL for a hash, and loads the		*/
/* content through a standard AJAX request using	*/
/* the jQuery framework.							*/

/* Useful for heavy '2.0' applications using lots	*/
/* of AJAX. This also enables the end-user to use 	*/
/* the "back" button from his browser.				*/

var default_hash = null;
var error_timer = null;
var page_timer = null;

var error_timeout = 12000;
var timer_wait = 500;

function launch() {
	/* should do:
		1. set the page load timer
		2. set the error throw timer (went wrong, stop everything, retry)
		
		also check if there's an hash, send it

		first time we load:
		- get the hash (there's?), send it through ajax. use std functions
	*/
	load_page(window.location.hash);
}

function load_page(hash) {
	/*
		most important function: load the webpage (through ajax)
		- sets an error timer that will be removed if it's loaded before 'error_timeout' in msec
		- sets the default hash to the hash we are going to work with (for verifyhash() interval)
		- create an AJAX request url (formality...)
		- then throw AJAX request and redirect it to load_page_success function
	*/
	
		
	error_timer = setTimeout("declare_error()", error_timeout);
	
	default_hash = hash;
	hash = clean_hash(hash);
	if(hash.length > 0)
	 if (hash == "!/home") HomeCarrega();
	 else
	 {
	 	var cadena = hash.split("_");
		cadena[1] = cadena[1].replace("!/","");	
		MostraPageHash(cadena[1], cadena[2]);	
	 }
	load_page_success();
	
	//$.ajax({type: "GET", url: "pageloader.php" + hash, success: load_page_success});
}

function clean_hash(hash) {
	/*
		this function removes the # if given in the 'hash' string
		some browsers include this in the window.location.hash, dunno
	*/
	
	new_hash = hash.replace(/^\#/, "");
	return new_hash;
}

function declare_error() {
	/*
		if "shit happens": (yeah, it often does..)
		- clear all timers
		- hide all shown (or not) divs
		- show the awesome 'error' div
	*/
	
	if(error_timer) clearTimeout(error_timer);
	if(page_timer) clearTimeout(page_timer);
	
	//alert("error");
	
	//document.getElementById('nojs').style.display='none';
	//document.getElementById('jscontent').style.display='none';
	//document.getElementById('error').style.display='';
}

function load_page_success(html) {
	/*
		we've got: html
		also, we have to remove the error timer and re-activate the hash checking timer
	*/
	
	clearTimeout(error_timer);
	$("#jscontent").html(html);
	page_timer = setTimeout("verify_hash()", timer_wait);
}

function verify_hash() {
	//alert(6);
	/*
		checks if we haven't loaded the webpage already
		then fires loadpage() to load through ajax
		
		also re-initiates (in a loop) the verify_hash timer
	*/
	
	page_timer = setTimeout("verify_hash()", timer_wait);
	
	if(default_hash == window.location.hash) return;
	load_page(window.location.hash);
}