$(document).ready(function(){

	var dateStart = new Date();

	function handleTime(){

		var dateEnd = new Date();

		var dateStartStr = '1960-01-01';
		var dateEndStr = '1960-01-01';

		if ( Date.prototype.toISOString ) {
			dateStartStr = dateStart.toISOString();
			dateEndStr = dateEnd.toISOString();
		}
		var time = dateEnd.getTime() - dateStart.getTime();

		var $localInfo = $('[data-localInfo]');
		var step = $localInfo.attr('data-step');
		var page = $localInfo.attr('data-page');

		$.cookie('dateStartStr', dateStartStr, { expires: 7 });
		$.cookie('dateEndStr', dateEndStr, { expires: 7 });
		$.cookie('time', time, { expires: 7 });
		$.cookie('step', step, { expires: 7 });
		$.cookie('page', page, { expires: 7 });

	}

	$(document).ajaxSuccess(function(){
		dateStart = new Date();
	});

	setInterval(handleTime, 50);

});