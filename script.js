function validatePlanetForm() {
	var name=document.forms["addplanet"]["name"].value;
	var size=document.forms["addplanet"]["size"].value;
	if (name==null || name=="") {
		alert("Planet name must be filled out");
		return false;
	}
	if (size==0) {
		alert("Planet size must be defined");
		return false;
	}
}
function validateDepositForm() {
	var value=document.forms["adddeposit"]["value"].value;
	var rmtype=document.forms["adddeposit"]["rmtype"].value;
	var planet=document.forms["adddeposit"]["planet"].value;
	if (value==null || value=="") {
		alert("Deposit size must be filled out");
		return false;
	}
	if (rmtype==0) {
		alert("Raw Material Type must be specified");
		return false;
	}
	if (planet==0) {
		alert("Planet must be specified");
		return false;
	}
}
function showSize(str) {
	if (str=="") {
		document.getElementById("x").innerHTML="<option value=''>--</option>";
		document.getElementById("y").innerHTML="<option value=''>--</option>";
		return;
	} 
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("x").innerHTML=xmlhttp.responseText;
			document.getElementById("y").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getsize.php?planet="+str,true);
	xmlhttp.send();
}