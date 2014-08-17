$(document).ready(function(){
	$(".col-md-1").height($(".col-md-1").width());
	$(window).resize(function() {
		$(".col-md-1").height($(".col-md-1").width());
	});
});