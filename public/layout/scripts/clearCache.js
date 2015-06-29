$(document).ready(function(){

	$.post(window.location.href, {'clear-cache':'true'}, function(){
		console.log('cache cleared');
	});

});