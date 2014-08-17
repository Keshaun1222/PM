function selectSystems(sect) {
	if (sect == "") {
		document.getElementById("system").innerHTML="<option value=\"\">Select a System</option>";
		return;
	} 
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("system").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "systems.php?id=" + sect, true);
	xmlhttp.send();
}

function selectPlanets(sys) {
	if (sys == "") {
		document.getElementById("planet").innerHTML="<option value=\"\">Select a Planet</option>";
		return;
	} 
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("planet").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "planets.php?id=" + sys, true);
	xmlhttp.send();
}

function showDeposits(plan) {
	if (plan == "") {
		document.getElementById("display").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("display").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "deposits.php?id=" + plan, true);
	xmlhttp.send();
}