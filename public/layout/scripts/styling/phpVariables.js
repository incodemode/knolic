$(function(){

	$("p:contains('$')").each(function(){
		console.log('contains');
		$p = $(this);
		var text = $p.html();
		text = text.replace(/(\$[a-zA-Z_]?[a-zA-Z_0-9]*(\[.*\]))/g, '<span class="phpVariable">$1</span>');
		console.log(text);
		$p.html(text);

	});

});