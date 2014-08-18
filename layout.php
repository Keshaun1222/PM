<?php
	include("constants.php");
	
	$mysqli = new mysqli($host, $user, $pass, $base);
	if (mysqli_connect_errno()) {
		$error = mysqli_connect_error();
		die("Connection failed: {$error}");
	}
	session_start();
	error_reporting($reporting);
	date_default_timezone_set("America/Phoenix");
	
	function head($page = "Home", $table = false) {
		$diff = time() - strtotime("December 3 1998");
		$years = floor($diff / (60 * 60 * 24 * 365));
		$days = floor($diff / (60 * 60 * 24)) - ($years * 365);
		$date = date("M j, Y H:i:s");
		$time = date("H:i:s");
		echo <<<Head
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Prospecting Manager</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<link href="css/footer.css" rel="stylesheet" />
Head;
		if ($table) {
			echo <<<Head
	<link href="css/table.css" rel="stylesheet" />
Head;
		}
		echo <<<Head
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Prospecting Manager</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
Head;
			if ($page == "Home") {
			echo <<<Head
					<li class="active">
						<a href="index.php">Home</a>
					</li>
Head;
		}
		else {
			echo <<<Head
					<li>
						<a href="index.php">Home</a>
					</li>
Head;
		}
		if ($page == "Add") {
			echo <<<Head
					<li class="active">
						<a href="new.php">Add Deposit</a>
					</li>
Head;
		}
		else {
			echo <<<Head
					<li>
						<a href="new.php">Add Deposit</a>
					</li>
Head;
		}
		if ($page == "View") {
			echo <<<Head
					<li class="active">
						<a href="view.php">View Deposits</a>
					</li>
Head;
		}
		else {
			echo <<<Head
					<li>
						<a href="view.php">View Deposits</a>
					</li>
Head;
		}
		echo <<< Head
				<li>
					<a href="https://github.com/keshaun1222/PM">GitHub</a>
				</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
						<a href="#" class="disabled" title="Combine Time">Y{$years} D{$days} {$time}</a>
					</li>
					<li>
						<a href="#" class="disabled" title="Real Time">{$date}</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
Head;
	}
	
	function breadcrumb($page = "Home", $section = "None") {
		echo <<<Breadcrumb
	<div class="breadcrumbs">
		<h1 class="pull-left">{$page}</h1>
		<ol class="breadcrumb pull-right">
Breadcrumb;
		if ($page == "Home") {
			echo <<<Home
			<li class="active">Home</li>
Home;
		}
		else {
			if ($section == "None") {
				echo <<<Page
			<li><a href="index.php">Home</a></li>
			<li class="active">{$page}</li>
Page;
			}
			else {
				$pagename = strtolower($page) . ".php";
				echo <<<Section
			<li><a href="index.php">Home</a></li>
			<li><a href="{$pagename}">{$page}</a></li>
			<li class="active">{$section}</a></li>
Section;
			}
		}
		
			echo <<<Breadcrumb
		</ol>
	</div>
Breadcrumb;
	}
	
	function body() {
		echo <<<Body
	<div class="container">
Body;
	}
	
	function foot($table = false) {
		echo <<<Foot
	</div>
	<div class="footer">
		<div class="container">
			<p class="text-muted">&copy; Lan Marcov 2014
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
Foot;
		if ($table) {
			echo <<<Foot
	<script type="text/javascript" src="js/table.js"></script>
Foot;
		}
		echo <<<Foot
</body>
</html>
Foot;
	}
?>