function selectSystems(sect) {
	if (sect == "") {
		document.getElementById("system").innerHTML="";
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
	xmlhttp.open("GET", "systems.php?sector=" + sect, true);
	xmlhttp.send();
}

function selectPlanets(sys) {
	if (sys == "") {
		document.getElementById("planet").innerHTML="";
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
	xmlhttp.open("GET", "planets.php?system=" + sys, true);
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
	xmlhttp.open("GET", "deposits.php?planet=" + plan, true);
	xmlhttp.send();
}