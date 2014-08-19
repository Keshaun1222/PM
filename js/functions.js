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

function selectPlanets(sys) {
	showDeposits("");
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

function selectSystems(sect) {
	selectPlanets("");
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

function displayXY(plan) {
	if (plan == "") {
		document.getElementById("x").innerHTML="";
		document.getElementById("y").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
		xmlhttps = new XMLHttpRequest();
	}
	else { 
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttps = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("x").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "xcoords.php?planet=" + plan, true);
	xmlhttp.send();
	
	xmlhttps.onreadystatechange = function() {
		if (xmlhttps.readyState == 4 && xmlhttps.status == 200) {
			document.getElementById("y").innerHTML = xmlhttps.responseText;
		}
	}
	xmlhttps.open("GET", "ycoords.php?planet=" + plan, true);
	xmlhttps.send();
}

function selectY(plan) {
	if (plan == "") {
		document.getElementById("y").innerHTML="";
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
			document.getElementById("y").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "coord.php?planet=" + plan, true);
	xmlhttp.send();
}

function selectPlanet(sys) {
	displayXY("");
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

function selectSystem(sect) {
	selectPlanet("");
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

function selectSys(sect) {
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