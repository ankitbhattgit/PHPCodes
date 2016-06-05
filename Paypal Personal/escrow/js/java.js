//create a form
jQuery(document).ready(function(){
	var esc_key	 =	document.getElementById('playerup').getAttribute('class');
	var button_key	 =	document.getElementById('playerup').getAttribute('name');
	
	printHTML(esc_key,button_key);

});





function printHTML(pid,button){


	var f = document.createElement("iframe");
	f.setAttribute('src',button);
	f.setAttribute('height','100%');
	f.setAttribute('width','100%');
	f.style.border="none";
	document.getElementById('playerup').appendChild(f); //pure javascript
	//jQuery('#playerup').html();

}
