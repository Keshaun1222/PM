$(document).ready(function(){
	$("td").height($("td").width());
	$(window).resize(function() {
		$("td").height($("td").width());
	});
});