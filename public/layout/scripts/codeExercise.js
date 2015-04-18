$(function(){
	
	$(document).on('ajaxFinished', '[data-code][data-exercise]', function(event, data){
		
		var $code = $(this);
		if(data && data.passed){
			var $executePanel = $code.nextAll('[data-executePanel]');
			var $nextButton = $executePanel.find('[data-nextButton]');
			var $executeButton = $executePanel.find('[data-executeButton]');
			$nextButton.show();
			$executeButton.hide();
		}
	});

	$(document).on('undone', '[data-code][data-exercise]', function(event, data){
		
		var $code = $(this);
		
		var $executePanel = $code.nextAll('[data-executePanel]');
		
		var $executeButton = $executePanel.find('[data-executeButton]');
		var $nextButton = $executePanel.find('[data-nextButton]');
		var $successWidget = $code.nextAll('[data-successWidget]').first();
    	var $errorWidget = $code.nextAll('[data-errorWidget]').first();

		$executeButton.show();
		$nextButton.hide();
		$successWidget.hide();
		$errorWidget.hide();
		
	});
});
