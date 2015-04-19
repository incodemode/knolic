$(document).ready(function(){
	$(document).on('click', '[data-nextButton]', function(){
		var nextUrl = $(this).attr('data-nextButton');
		document.location.href = nextUrl;
	});
});