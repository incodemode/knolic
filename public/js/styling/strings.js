$(function(){

	$("p:contains('$')").each(function(){
		$p = $(this);
		var text = $p.html();
		text = text.replace(/('.*')/g, '<span class="phpVariable">$1</span>');
		$p.html(text);

	});

});