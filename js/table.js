$(document).ready(function(){
	$(".col").height($(".col").width());
	$(window).resize(function() {
		$(".col").height($(".col").width());
	});
});