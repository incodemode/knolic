$(document).ready(function(){
	
	$(document).on('click', '[data-nextButton]', function(){
		var nextUrl = $(this).attr('data-nextUrl');
		document.location.href = nextUrl;
	});
	$(document).on('click', '[data-previousButton]', function(){
		var previousUrl = $(this).attr('data-previousUrl');
		document.location.href = previousUrl;
	});


});