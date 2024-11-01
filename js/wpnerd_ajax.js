function wpnerd_save_checkbox() { 
	if(jQuery('#facebook_options').css('display') == 'none') {
		document.getElementById('facebook_options').style.display = 'flex';
	}
	else {
		document.getElementById('facebook_options').style.display = 'none';
	}
}

function wpnerd_minify(){
	if(jQuery('#minify_options').css('display') == 'none') {
		document.getElementById('minify_options').style.display = 'flex';
	}
	else {
		document.getElementById('minify_options').style.display = 'none';
	}
}

function wpnerd_google(){
	if(jQuery('#analytics_options').css('display') == 'none') {
		document.getElementById('analytics_options').style.display = 'flex';
	}
	else {
		document.getElementById('analytics_options').style.display = 'none';
	}
}

function wpnerd_smile(){
	if(jQuery('#emoji_options').css('display') == 'none') {
		document.getElementById('emoji_options').style.display = 'flex';
	}
	else {
		document.getElementById('emoji_options').style.display = 'none';
	}
}

function wpnerd_unnoetig(){
	if(jQuery('#version_options').css('display') == 'none') {
		document.getElementById('version_options').style.display = 'flex';
	}
	else {
		document.getElementById('version_options').style.display = 'none';
	}
}

function wpnerd_querie(){
	if(jQuery('#querie_options').css('display') == 'none') {
		document.getElementById('querie_options').style.display = 'flex';
	}
	else {
		document.getElementById('querie_options').style.display = 'none';
	}
}

function wpnerd_hilfe1(){
	if(jQuery('#wpnerd_hilfe1').css('display') == 'none') {
		document.getElementById('wpnerd_hilfe1').style.display = 'flex';
	}
	else {
		document.getElementById('wpnerd_hilfe1').style.display = 'none';
	}
}
function wpnerd_hilfe2(){
	if(jQuery('#wpnerd_hilfe2').css('display') == 'none') {
		document.getElementById('wpnerd_hilfe2').style.display = 'flex';
	}
	else {
		document.getElementById('wpnerd_hilfe2').style.display = 'none';
	}
}
function wpnerd_hilfe3(){
	if(jQuery('#wpnerd_hilfe3').css('display') == 'none') {
		document.getElementById('wpnerd_hilfe3').style.display = 'flex';
	}
	else {
		document.getElementById('wpnerd_hilfe3').style.display = 'none';
	}
}

// testing some shit#
 function foo () {
 	document.getElementById('log').innerHTML = "Erstelle Backup...<br> <img src='" + wpnerd.pluginsUrl + "/wp-nerd-toolkit/inc/img/wp-nerd.gif' />";
      jQuery.ajax({
        url: wpnerd.ajax_url, //the page containing php script
        data: {backupen: 'Jetzt Backup erstellen'},
        type: "POST", //request type
        async: true,
        cache: false,
        success:function(result){
         //alert(result);
         document.getElementById('log').innerHTML = "Backup erfolgreich erstellt.<br> <img src='" + wpnerd.pluginsUrl + "/wp-nerd-toolkit/inc/img/backup_ok.png' />";
       }
     });
 }